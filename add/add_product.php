<?php
    require_once '../connect.php';
    
    session_start();
    $_SESSION['id_prod'] = $_POST['id_prod'];
    $_SESSION['id_f'] = $_POST['id_f'];
    $_SESSION['number'] = $_POST['number'];
    
    
    mysqli_query($connect, "INSERT INTO `продукція` (`ID плану`, `ID продукції`, `ID фасону`, `Кількість`)
VALUES ('$_SESSION[plan]',
(
SELECT `ID`
FROM `довідник продукції`
WHERE `Назва` = '$_SESSION[id_prod]'
)
,
(
SELECT `ID`
FROM `довідник фасону`
WHERE `Назва` = '$_SESSION[id_f]'
)
,'$_SESSION[number]')");


    for($i = 1; $i <= 6; $i++){
       $norm = mysqli_query($connect, "SELECT `Норма витрат` 
FROM `нормативний список` 
WHERE `ID фасону` = ( SELECT `ID` FROM `довідник фасону` WHERE `Назва` = '$_SESSION[id_f]' ) and `ID сировини` = '$i'");
        $n = mysqli_fetch_assoc($norm);
        $norms = $n['Норма витрат'];
        $spend = $norms * $_SESSION['number'];
        
        mysqli_query($connect, "INSERT INTO `проміжкова`(`ID плану`, `ID продукції`, `ID фасону`, `ID сировини`, `Витрати`) 
VALUES ( '$_SESSION[plan]', (
SELECT `ID`
FROM `довідник продукції`
WHERE `Назва` = '$_SESSION[id_prod]'
)
,
(
SELECT `ID`
FROM `довідник фасону`
WHERE `Назва` = '$_SESSION[id_f]'
), '$i', '$spend')");

        $f = mysqli_query($connect, "SELECT `Необхідний ліміт нам на місяць` FROM `потреби` WHERE `ID плану`='$_SESSION[plan]' and `ID сировини`='$i'");
        $f = mysqli_fetch_assoc($f);

        if($f['Необхідний ліміт нам на місяць'] != NULL){
            // echo("ubub");
            mysqli_query($connect, "UPDATE `потреби` SET `Необхідний ліміт нам на місяць` = (SELECT SUM(`Витрати`) 
            FROM `Проміжкова` WHERE `ID плану`= '$_SESSION[plan]' and `ID сировини` = '$i') WHERE `потреби`.`ID плану` = '$_SESSION[plan]' and `потреби`.`ID сировини` = '$i'");
        }
        if($f['Необхідний ліміт нам на місяць'] == NULL){
            // echo("wfergthy");
            mysqli_query($connect, "INSERT INTO `потреби`(`ID плану`, `ID сировини`, `Необхідний ліміт нам на місяць`) 
            VALUES ('$_SESSION[plan]','$i', (SELECT SUM(`Витрати`)
            FROM `Проміжкова`
            WHERE `ID плану`= '$_SESSION[plan]' and `ID сировини` = '$i'))");
        }
    }

    header('Location: table_forms.php');
?>


