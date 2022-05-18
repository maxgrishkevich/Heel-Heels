<?php
    require_once '../connect.php';

    $id1 = $_GET['id1'];
    $id2 = $_GET['id2'];
    $id3 = $_GET['id3'];
    $other = mysqli_query($connect, "SELECT * FROM `продукція` WHERE `ID плану`= '$id1' AND `ID продукції`= '$id2' AND `ID фасону`= '$id3'");
    $other = mysqli_fetch_assoc($other);


?>

<!doctype html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="/src/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="/styles/table.css">
        <link rel="stylesheet" href="/styles/forms.css">
        <link rel="stylesheet" href="/styles/style.css">
        <title>Редагуваня таблиць</title>
    </head>

    <body>
        <?php
            require_once './header.html';
        ?>
        <div class="contain">
            <h2 class="text-center">Редагування таблиці</h2>
            <form action="update_product.php" method="post">
            <div class="dws-input">
                <input type="hidden" name="id1" value="<?= $other['ID плану'] ?>">
            </div>
            <div class="dws-input">
                <input type="hidden" name="id2" value="<?= $other['ID продукції'] ?>">
            </div>
            <div class="dws-input">
                <input type="hidden" name="id3" value="<?= $other['ID фасону'] ?>">
            </div>
                <p>ID плану</p>
            <div class="dws-input">
                <input type="number" name="id_plan" value="<?= $other['ID плану'] ?>">
            </div>
                <p>ID продукції</p>
            <div class="dws-input">
                <input type="number" name="id_prod" value="<?= $other['ID продукції'] ?>">
            </div>
                <p>ID фасону</p>
            <div class="dws-input">
                <input type="number" name="id_fas" value="<?= $other['ID фасону'] ?>">
            </div>
                <p>Кількість</p>
            <div class="dws-input">
                <input type="number" name="number" value="<?= $other['Кількість'] ?>">
            </div>
                <br><br>
                <button type="submit">Оновити</button>
            </form>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </body>

</html>