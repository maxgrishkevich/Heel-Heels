<?php
    require_once '../connect.php';

    $id = $_GET['id'];

    mysqli_query($connect, "DELETE FROM `план` WHERE `план`.`ID` = '$id'");
    header('Location: edit_delete.php');
?>