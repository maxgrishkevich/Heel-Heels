<?php
    require_once '../connect.php';

    $id_plan = $_POST['id_plan'];
    $id_prod = $_POST['id_prod'];
    $id_fas = $_POST['id_fas'];
    $number = $_POST['number'];

    $id1 = $_POST['id1'];
    $id2 = $_POST['id2'];
    $id3 = $_POST['id3'];
    $id4 = $_POST['id4'];
    session_start();
    mysqli_query($connect, "UPDATE `продукція` 
    SET `ID плану` = '$id_plan', `ID продукції` = '$id_prod', `ID фасону` = '$id_fas', `Кількість` = '$number' 
    WHERE `продукція`.`ID плану`= '$id1' AND `продукція`.`ID продукції`= '$id2' AND `продукція`.`ID фасону`= '$id3'");



for($i = 1; $i <= 6; $i++){
    $norm = mysqli_query($connect, "SELECT `Норма витрат`
                                     FROM `нормативний список`
                                     WHERE `ID фасону` = '$id_fas' and `ID сировини` = '$i'");
     $n = mysqli_fetch_assoc($norm);
     $norms = $n['Норма витрат'];
     $spend = $norms * $number;
     
     mysqli_query($connect,  "UPDATE `проміжкова` 
     SET `ID плану` = '$id_plan', `ID продукції` = '$id_prod', `ID фасону` = '$id_fas', `Витрати`='$spend', `ID сировини`='$i'
     WHERE `проміжкова`.`ID плану`= '$id1' AND `проміжкова`.`ID продукції`= '$id2' AND `проміжкова`.`ID фасону`= '$id3' 
     and `проміжкова`.`ID сировини`='$i'");

     $f = mysqli_query($connect, "SELECT `Необхідний ліміт нам на місяць` FROM `потреби` WHERE `ID плану`='$id_plan' and `ID сировини`='$i'");
     $f = mysqli_fetch_assoc($f);

     if($f['Необхідний ліміт нам на місяць'] != NULL){
         mysqli_query($connect, "UPDATE `потреби` SET `Необхідний ліміт нам на місяць` = (SELECT SUM(`Витрати`) 
         FROM `Проміжкова` WHERE `ID плану`= '$id_plan' and `ID сировини` = '$i') WHERE `потреби`.`ID плану` = '$id_plan' and `потреби`.`ID сировини` = '$i'");
     }
     if($f['Необхідний ліміт нам на місяць'] == NULL){
         mysqli_query($connect, "INSERT INTO `потреби`(`ID плану`, `ID сировини`, `Необхідний ліміт нам на місяць`) 
         VALUES ('$id_plan','$i', (SELECT SUM(`Витрати`)
         FROM `Проміжкова`
         WHERE `ID плану`= '$id_plan' and `ID сировини` = '$i'))");
     }
 }

    header('Location: edit_delete.php');

?>