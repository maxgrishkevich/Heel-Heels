<?php
    require_once '../connect.php';
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="/styles/table.css">
        <link rel="shortcut icon" href="/src/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="/styles/style.css">
        <link rel="stylesheet" href="/styles/forms.css">
        <title>Редагуваня таблиць</title>
    </head>

    <body>
        <?php
            require_once './header.html';
        ?>
    <!--Форми для створення та редагування планів-->
        <div class="contain">
            <h3>Створити/Доповнити план</h3>
            <form action="add_plan.php" method="post">
                <p>ID плану</p>
                <div class="dws-input">
                    <input type="number" name="id">
                </div>
                <p>Дата створення</p>
                <div class="dws-input">
                    <input type="date" name="date">
                </div>
                <br><br>
                <div class="dws-submit">
                    <button class="btn-submit" type="submit">Підтвердити</button>
                </div>
            </form>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </body>
</html> 

 <!-- <div clas="forms">
            <h3>Редагувати план</h3>
            <form action="" method="post">
                <p>ID плану</p>
                <input type="number" name="id">
                <p>Дата створення</p>
                <input type="date" name="date">
                <br><br>
                <button type="submit">Редагувати план</button>
            </form>
        </div> -->