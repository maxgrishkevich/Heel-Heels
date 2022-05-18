<?php
    require_once '../connect.php';

    $id1 = $_GET['id1'];
    $id2 = $_GET['id2'];
    $id3 = $_GET['id3'];
    mysqli_query($connect, "DELETE FROM `продукція` WHERE `продукція`.`ID плану`= '$id1' AND `продукція`.`ID продукції`= '$id2' AND `продукція`.`ID фасону`= '$id3'");
    mysqli_query($connect, "DELETE FROM `проміжкова` WHERE `проміжкова`.`ID плану`= '$id1' AND `проміжкова`.`ID продукції`= '$id2' AND `проміжкова`.`ID фасону`= '$id3'");

    for($i = 1; $i <= 6; $i++){
        
        $f = mysqli_query($connect, "SELECT SUM(`Витрати`) 
                                        FROM `Проміжкова` WHERE `ID плану`= '$id1' and `ID сировини` = '$i'");
        $f = mysqli_fetch_assoc($f);
 
        if($f['SUM(`Витрати`)'] != NULL){
             mysqli_query($connect, "UPDATE `потреби` SET `Необхідний ліміт нам на місяць` = (SELECT SUM(`Витрати`) 
             FROM `Проміжкова` WHERE `ID плану`= '$id1' and `ID сировини` = '$i') WHERE `потреби`.`ID плану` = '$id1' and `потреби`.`ID сировини` = '$i'");
        }
        if($f['SUM(`Витрати`)'] == NULL){
             mysqli_query($connect, "DELETE FROM `Потреби` WHERE `ID плану`= '$id1' and `ID сировини` = '$i'");
        }
    }

    header('Location: edit_delete.php');
?>