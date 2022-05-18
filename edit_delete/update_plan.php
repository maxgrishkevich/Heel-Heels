<?php
    require_once '../connect.php';

    session_start();
    $_SESSION['plan'] = $_POST['id'];
    $date = $_POST['date'];
    $ids = $_POST['ids'];

    if($_SESSION['plan']<=0){
        $message = "Помилка вводу!";
        echo "<script type='text/javascript'>alert('$message');</script>";
        exit();
    }

    mysqli_query($connect, "UPDATE `план` SET `ID` = '$_SESSION[plan]', `Місяць` = '$date' WHERE `план`.`ID` = '$ids'");
    header('Location: edit_delete.php');

?>