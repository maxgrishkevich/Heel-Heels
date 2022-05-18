<?php
    require_once '../connect.php';
    session_start();
$_SESSION['plannn'] = $_POST['id'];
$_SESSION['prsir'] = $_POST['idsir'];

$norm = mysqli_query($connect, "SELECT `ID` FROM `план` WHERE `ID` = $_SESSION[plannn]");
$n = mysqli_fetch_assoc($norm);
$norms = $n['ID'];

if($_SESSION['plannn'] == NULL || !$norms || $_SESSION['prsir']== NULL){
    header('Location: adpl.php');
}else{
    header('Location: table_form_sir.php');
}


?>
