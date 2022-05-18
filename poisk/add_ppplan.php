<?php
    require_once '../connect.php';
    session_start();
    $_SESSION['plann'] = $_POST['id'];

    $norm = mysqli_query($connect, "SELECT `ID` FROM `план` WHERE `ID` = '$_SESSION[plann]'");
    $n = mysqli_fetch_assoc($norm);
    $norms = $n['ID'];

    if($_SESSION['plann'] == NULL || !$norms ){
        header('Location: adddpp.php');
    }else{
       header('Location: table_forms.php');
    }


?>

