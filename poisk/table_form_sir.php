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
            <th>Сколько у нас было</th>
        </tr>
        <?php
            $product = mysqli_query($connect,"SELECT `Необхідний ліміт нам на місяць`
                                                FROM `потреби` pr
                                                INNER JOIN `план` pl
                                                ON (pl.`ID` = pr.`ID плану`)
                                                INNER JOIN `довідник сировини` sr
                                                ON (sr.`ID` = pr.`ID сировини`)
                                                WHERE pl.`ID` = $_SESSION[plannn] AND `Назва` = '$_SESSION[prsir]'
                                          ");
            $product = mysqli_fetch_all($product);
            foreach ($product as $produc ) {
                ?>
                <tr>
                    <td><?= $produc[0] ?></td>
                </tr>
                <?php
            }
            ?>

    </table>
    <br><br>
    <table class="center">
        <tr>
            <th>Сумма сколько мы потратили</th>
        </tr>
        <?php
            $product = mysqli_query($connect,"SELECT SUM(`Кількість використаних за день`)
                                                FROM `облік використаних матеріалів` po
                                                INNER JOIN  `план` pl
                                                ON (pl.`ID` = po.`ID плану`)
                                                INNER JOIN `довідник сировини` si
                                                ON (si.`ID` = po.`id cировини`)
                                                WHERE pl.`ID` = $_SESSION[plannn] AND `Назва` = '$_SESSION[prsir]'");
            $product = mysqli_fetch_all($product);
            foreach ($product as $produc ) {
                ?>
                <tr>
                    <td><?= $produc[0] ?></td>
                </tr>
                <?php
            }
            ?>

    </table>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>