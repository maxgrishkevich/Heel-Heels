<?php
    require_once '../connect.php';
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="/src/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="/styles/style.css">
        <link rel="stylesheet" href="/styles/table.css">
        <title>Редагуваня таблиць</title>
    </head>



    <body>
        <?php
            require_once './header.html';
        ?>
<!--Куча непонятних табличок-->
        <div class="bubble b1"></div>
        <div class="bubble b2"></div>
        <div>
            
            <h3 class="text-center">
                ---ПЛАН
            </h3>
            <table class="center">
                <tr>
                    <th>ID</th>
                    <th>Місяць</th>
                </tr>
                <?php
                $plan = mysqli_query($connect,"SELECT * FROM `план` ORDER BY `ID`");
                $plan = mysqli_fetch_all($plan);
                foreach ($plan as $plann ) {
                ?>
                <tr>
                    <td><?= $plann[0] ?></td>
                    <td><?= $plann[1] ?></td>
                    <td><a href="edit_plan.php?id=<?= $plann[0] ?>">Редагувати</a></td>
                    <td><a href="delete_plan.php?id=<?= $plann[0] ?>">Видалити</a></td>
                </tr>
                <?php
            }?>
            </table>
        </div>

        <div>
            <h3 class="text-center">
                ---ПРОДУКЦІЯ
            </h3>
            <table class="center">
                <tr>
                    <th>ID плану</th>
                    <th>ID продукції</th>
                    <th>ID фасону</th>
                    <th>Кількість</th>
                </tr>
                <?php
                $product = mysqli_query($connect,"SELECT * FROM `продукція`  ORDER BY `ID плану`");
                $product = mysqli_fetch_all($product);
                foreach ($product as $produc ) {
                    ?>
                    <tr>
                        <td><?= $produc[0] ?></td>
                        <td><?= $produc[1] ?></td>
                        <td><?= $produc[2] ?></td>
                        <td><?= $produc[3] ?></td>
                        <td><a href="edit_product.php?id1=<?= $produc[0] ?>&id2=<?= $produc[1] ?>&id3=<?= $produc[2] ?>&id4=<?= $produc[3] ?>">Редагувати</a></td>
                        <td><a href="delete_product.php?id1=<?= $produc[0] ?>&id2=<?= $produc[1] ?>&id3=<?= $produc[2] ?>&id4=<?= $produc[3] ?>">Видалити</a></td>
                    </tr>
                <?php
            }?>
            </table>
        </div>

        <!-- <div>
            <h3 class="text-center">
                ---ПОТРЕБИ
            </h3>
            <table class="center">
                <tr>
                    <th>ID плану</th>
                    <th>ID сировини</th>
                    <th>Необхідний ліміт нам на місяць</th>
                </tr>
                <?php
                $potreb = mysqli_query($connect,"SELECT * FROM `потреби`");
                $potreb = mysqli_fetch_all($potreb);
                foreach ($potreb as $potrebb ) {
                    ?>
                    <tr>
                        <td><?= $potrebb[0] ?></td>
                        <td><?= $potrebb[1] ?></td>
                        <td><?= $potrebb[2] ?></td>
                    </tr>
                    <?php
                }?>
            </table>
        </div> -->

        <div>
            <h3 class="text-center">
                ---ОБЛІК ВИКОРИСТАНИХ МАТЕРІАЛІВ
            </h3>
            <table class="center">
                <tr>
                    <th>ID плану</th>
                    <th>ID сировини</th>
                    <th>Дата</th>
                    <th>Кількість використаних за день</th>
                </tr>
                <?php
                $oblik = mysqli_query($connect,"SELECT * FROM `облік використаних матеріалів`");
                $oblik = mysqli_fetch_all($oblik);
                foreach ($oblik as $oblikk) {
                    ?>
                    <tr>
                        <td><?= $oblikk[0] ?></td>
                        <td><?= $oblikk[3] ?></td>
                        <td><?= $oblikk[1] ?></td>
                        <td><?= $oblikk[2] ?></td>
                        <td><a href="edit_accounting.php?id1=<?= $oblikk[0] ?>&id2=<?= $oblikk[3] ?>&id3=<?= $oblikk[1] ?>">Редагувати</a></td>
                        <td><a href="delete_accounting.php?id1=<?= $oblikk[0] ?>&id2=<?= $oblikk[3] ?>&id3=<?= $oblikk[1] ?>">Видалити</a></td>
                    </tr>
                    <?php
                }?>
            </table>
        </div>

        <!-- <div>
            <h3 class="text-center">
                ---ЗВІТ ВИКОРИСТАНИХ МАТЕРІАЛІВ ЗА МІСЯЦЬ
            </h3>
            <table class="center">
                <tr>
                    <th>ID плану</th>
                    <th>ID сировини</th>
                    <th>Місяць</th>
                    <th>Кількість</th>
                </tr>
                <?php
                $zvit = mysqli_query($connect,"SELECT * FROM `звіт по використаним матеріалам за місяць`");
                $zvit = mysqli_fetch_all($zvit);
                foreach ($zvit as $zvitt ) {
                    ?>
                    <tr>
                        <td><?= $zvitt[0] ?></td>
                        <td><?= $zvitt[1] ?></td>
                        <td><?= $zvitt[3] ?></td>
                        <td><?= $zvitt[2] ?></td>
                    </tr>
                    <?php
                }?>
            </table>
        </div> -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </body>
</html> 