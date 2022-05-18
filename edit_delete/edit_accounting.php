<?php
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    require_once '../connect.php';

    $id1 = $_GET['id1'];
    $id2 = $_GET['id2'];
    $id3 = $_GET['id3'];
    $other = mysqli_query($connect, "SELECT * FROM `облік використаних матеріалів` WHERE `ID плану`= '$id1' AND `ID cировини`='$id2' AND `Дата` = '$id3'");
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
            <h3>Редагування таблиці</h3>
            <form action="update_accounting.php" method="post">
            <div class="dws-input">
                <input type="hidden" name="id1" value="<?= $other['ID плану'] ?>">
            </div>
            <div class="dws-input">
                <input type="hidden" name="id2" value="<?= $other['id cировини'] ?>">
            </div>
            <div class="dws-input">
                <input type="hidden" name="id3" value="<?= $other['Дата'] ?>">
            </div>
                <p>ID плану</p>
                <div class="dws-input">
                <input type="number" name="id_plan" value="<?= $other['ID плану'] ?>">
                </div>
                <p>ID сировини</p>
                <div class="dws-input">
                <input type="number" name="id_mat" value="<?= $other['ID cировини'] ?>">
                </div>
                <p>Дата отримання</p>
                <div class="dws-input">
                <input type="date" name="date" value="<?= $other['Дата'] ?>">
                </div>
                <p>Кількість</p>
                <div class="dws-input">
                <input type="number" name="number" value="<?= $other['Кількість використаних за день'] ?>">
                </div>
                <br><br>
                <button type="submit">Оновити</button>
            </form>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </body>

</html>