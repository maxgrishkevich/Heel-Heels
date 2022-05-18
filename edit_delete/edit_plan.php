<?php
    require_once '../connect.php';

    $id = $_GET['id'];
    $other = mysqli_query($connect, "SELECT * FROM `план` WHERE `ID`= '$id'");
    $other = mysqli_fetch_assoc($other);


?>

<!doctype html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="/src/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="/styles/table.css">
        <link rel="stylesheet" href="/styles/style.css">
        <link rel="stylesheet" href="/styles/forms.css">
        <title>Редагуваня таблиць</title>
    </head>

    <body>
        <?php
            require_once './header.html';
        ?>

        <div class="contain">
            <h2 class="text-center">Редагування таблиці</h2>
            <form action="update_plan.php" method="post">
            <div class="dws-input">
                <input type="hidden" name="ids" value="<?= $other['ID'] ?>">
            </div>
                <p>ID плану</p>
                <div class="dws-input">
                    <input type="number" name="id" value="<?= $other['ID'] ?>">
                </div>
                <p>Дата створення</p>
                <div class="dws-input">
                    <input type="date" name="date" value="<?= $other['Місяць'] ?>">
                </div>
                <br><br>
                <button type="submit">Оновити</button>
            </form>
        </div>
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</html>