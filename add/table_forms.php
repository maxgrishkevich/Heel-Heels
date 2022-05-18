<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="/src/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="/styles/table.css">
        <link rel="stylesheet" href="/styles/style.css">
        <link rel="stylesheet" href="/styles/forms.css">
        <link rel="stylesheet" href="/styles/inlineTables.css">
        <title>Редагуваня таблиць</title>
    </head>

    <body>
        <?php
          require_once './header.html';
        ?>
        <div class="forms">
        <div class="contain">
            <h3>Додати продукцію</h3>
            <form action="add_product.php" method="post">
                <p>Назва продукції</p>
                <input type="text" name="id_prod">
                <p>Назва фасону</p>
                <input type="text" name="id_f">
                <p>Кількість</p>
                <input require type="number" name="number">
                <br><br>
                <button type="submit">Додати продукцію</button>
            </form>
        </div>

        <div class="contain">
            <h3>Облік використаних матеріалів</h3>
            <form action="add_accounting.php" method="post">
                <p>Дата</p>
                <input type="date" name="date_mat">
                <p>Кількість використаних за день</p>
                <input type="number" name="spend">
                <p>Назва сировини</p>
                <input type="text" name="id_mat">
                <br><br>
                <button type="submit">Додати потреби</button>
            </form>
        </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </body>
</html>