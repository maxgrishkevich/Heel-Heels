<?php
    require_once '../connect.php';

    $id1 = $_GET['id1'];
    $id2 = $_GET['id2'];
    $id3 = $_GET['id3'];
    mysqli_query($connect, "DELETE FROM `облік використаних матеріалів` WHERE `облік використаних матеріалів`.`ID плану`= '$id1' 
    AND `облік використаних матеріалів`.`id cировини`= '$id2' AND `облік використаних матеріалів`.`Дата`= '$id3'");

    $time=strtotime($id3);
    $id3=date("m",$time);
    
    $f = mysqli_query($connect, "SELECT SUM(`Кількість використаних за день`) 
                                FROM `облік використаних матеріалів` WHERE `ID плану`= '$id1' and `ID cировини` = '$id2'");

    $f = mysqli_fetch_assoc($f);

    if($f['SUM(`Кількість використаних за день`)'] != NULL){
            mysqli_query($connect, "UPDATE `звіт по використаним матеріалам за місяць` SET `Кількість` = (SELECT SUM(`Кількість використаних за день`) 
                                    FROM `облік використаних матеріалів` WHERE `ID плану`= '$id1' and `ID cировини` = '$id2') 
                                    WHERE `звіт по використаним матеріалам за місяць`.`ID плану` = '$id1' 
                                    and `звіт по використаним матеріалам за місяць`.`ID сировини` = '$id2' 
                                    and `звіт по використаним матеріалам за місяць`.`Місяць` = '$id3'");
    }
        
    if($f['SUM(`Кількість використаних за день`)'] == NULL){
            mysqli_query($connect, "DELETE FROM `звіт по використаним матеріалам за місяць` WHERE `ID плану`= '$id1' and `ID сировини` = '$id2'");
    }
    
    header('Location: edit_delete.php');
?>