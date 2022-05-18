<?php
    require_once '../connect.php';

    $id_plan = $_POST['id_plan'];
    $id_mat = $_POST['id_mat'];
    $date = $_POST['date'];
    $number = $_POST['number'];

    $id1 = $_POST['id1'];
    $id2 = $_POST['id2'];
    $id2 = $_POST['id3'];
    mysqli_query($connect, "UPDATE `облік використаних матеріалів` SET `ID плану` = '$id_plan', `ID cировини` = '$id_mat', `Дата` = '$date', 
                        `Кількість використаних за день` = '$number' WHERE `облік використаних матеріалів`.`ID плану`= '$id_plan' 
                        AND `облік використаних матеріалів`.`ID cировини`= '$id_mat' AND `облік використаних матеріалів`.`Дата`= '$date'");

    $time=strtotime($date);
    $date_mat=date("m",$time);

    $f = mysqli_query($connect, "SELECT `Кількість` FROM `звіт по використаним матеріалам за місяць` 
                                        WHERE `ID плану`='$id_plan' and `ID сировини`='$id_mat'");
    $f = mysqli_fetch_assoc($f);

    mysqli_query($connect, "UPDATE `звіт по використаним матеріалам за місяць` SET `Кількість` = (SELECT SUM(`Кількість використаних за день`) 
                                    FROM `облік використаних матеріалів` WHERE `ID плану`= '$id_plan' and `ID cировини` = '$id_mat') 
                                    WHERE `звіт по використаним матеріалам за місяць`.`ID плану` = '$id_plan' 
                                    and `звіт по використаним матеріалам за місяць`.`ID сировини` = '$id_mat' 
                                    and `звіт по використаним матеріалам за місяць`.`Місяць` = '$date_mat'");
    
    header('Location: edit_delete.php');
?>