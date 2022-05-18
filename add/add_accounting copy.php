<?php
    require_once '../connect.php';
    
    $date_mat = $_POST['date_mat'];
    $spend = $_POST['spend'];
    $id_mat = $_POST['id_mat'];

    if($spend < 0){
        $message = "Помилка вводу!";
        echo "<script type='text/javascript'>alert('$message');</script>";
        exit();
    }

    session_start();
    mysqli_query($connect, "INSERT INTO `облік використаних матеріалів` (`ID плану`, `Дата`, `Кількість використаних за день`, `id cировини`)
VALUES ('$_SESSION[plan]', '$date_mat' , '$spend',
(
SELECT `ID`
FROM `довідник сировини`
WHERE `Назва` = '$id_mat'
)
)");
    header('Location: table_forms.php');
?>



