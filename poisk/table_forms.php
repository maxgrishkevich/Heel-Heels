<?php
    require_once '../connect.php';
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="/src/favicon.ico" type="image/x-icon">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/styles/table.css">
    <link rel="stylesheet" href="/styles/style.css">

    <title>About us</title>
</head>
<body>
    <?php 
        require_once './header.html';
    ?>
        <div class="bubble b1"></div>
        <div class="bubble b2"></div>
        <h2 class="text-center">Вывод данных по плану</h2>
        <br><br>
        <table class="center">
            <tr>
            <th>ID плану</th>
            <th>Назва продукції</th>
            <th>Назва фасону</th>
            <th>Кількість</th>
            </tr>
            <?php


            $product = mysqli_query($connect,"SELECT `ID плану`,pr.`Назва`,fa.`Назва`,`Кількість`
                                                FROM `продукція`
                                                INNER JOIN `план`pl
                                                ON (`ID плану` = pl.`ID`)
                                                INNER JOIN `довідник продукції`pr
                                                ON (`ID продукції` = pr.`ID`)
                                                INNER JOIN `довідник фасону`fa
                                                ON (`ID фасону` = fa.`ID`)
                                                WHERE pl.`ID` = $_SESSION[plann]");
            $product = mysqli_fetch_all($product);
            foreach ($product as $produc ) {
            ?>
            <tr>
                <td><?= $produc[0] ?></td>
                <td><?= $produc[1] ?></td>
                <td><?= $produc[2] ?></td>
                <td><?= $produc[3] ?></td>
            </tr>
            <?php
            }
            ?>
        </table>
            <br><br>
            <table class = "center">
            <tr>
                <th>ID плану</th>
                <th>Название сырья</th>
                <th>Сума кількості використаних за день</th>
            </tr>
            <?php
            $oblik = mysqli_query($connect,
                "SELECT pl.`ID`,`Назва`, SUM(`Кількість використаних за день`)
                FROM `облік використаних матеріалів` pr
                INNER JOIN  `план` pl
                ON (pl.`ID` = pr.`ID плану`)
                INNER JOIN `довідник сировини` sr
                ON (sr.`ID` = pr.`id cировини`)
                WHERE pl.`ID` = $_SESSION[plann]
                GROUP BY `Назва`");
            $oblik = mysqli_fetch_all($oblik);
            foreach ($oblik as $oblikk) {
                ?>
                <tr>
                    <td><?= $oblikk[0] ?></td>
                    <td><?= $oblikk[1] ?></td>
                    <td><?= $oblikk[2] ?></td>
                </tr>
                <?php
            }
            ?>

        </table>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </body>
</html>