<?php
    require_once '../connect.php';
    session_start();
$_SESSION['plan'] = $_POST['id'];
$_SESSION['idprod'] = $_POST['idprod'];
$norm = mysqli_query($connect, "SELECT `ID` FROM `план` WHERE `ID` = $_SESSION[plan]");
$n = mysqli_fetch_assoc($norm);
$norms = $n['ID'];

if($_SESSION['plan'] == NULL || !$norms ){
    header('Location: adk.php');
}else{
    header('Location: table_form_productplan.php');
}


?>