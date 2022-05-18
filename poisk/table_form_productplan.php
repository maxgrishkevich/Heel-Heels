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
    <table class = "center">
        <tr>
            <th>Назва фасону</th>
            <th>Кількість</th>
        </tr>
        <?php

        $product = mysqli_query($connect,"SELECT fa.`Назва`,`Кількість`
                                            FROM продукція pr
                                            INNER JOIN план pl
                                            ON(pl.`ID` = pr.`ID плану`)
                                            INNER JOIN `довідник продукції`dp
                                            ON(dp.`ID`= pr.`ID фасону`)
                                            INNER JOIN `довідник фасону`fa
                                            ON(fa.`ID`= pr.`ID фасону`)
                                            WHERE `ID плану` = $_SESSION[plan] and dp.`Назва` = '$_SESSION[idprod]'");
        $product = mysqli_fetch_all($product);
        foreach ($product as $produc ) {
            ?>
            <tr>
                <td><?= $produc[0] ?></td>
                <td><?= $produc[1] ?></td>
            </tr>
            <?php
        }
        ?>

    </table>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>