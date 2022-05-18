<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="/src/favicon.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/styles/style.css">
    <link rel="stylesheet" type="text/css" href="/styles/poisk.css">
    <link rel="stylesheet" type="text/css" href="/styles/table.css">

    <title>Choosing</title>
</head>
<body>
    <?php 
        require_once './header.html';
    ?>
    <div class="bubble b1"></div>
    <div class="bubble b2"></div>
    <h2 class="heading">Выберите по каким критерия осуществлять поиск:</h2>
    <div class="choice row">
        <a href="adddpp.php">Поиск данных по id плана</a>
        <a href="adk.php">Поиск данных по id плана, продукции</a>
        <a href="adpl.php">Поиск данных по id плана, сырью</a>
        <a href="spravochnik.php">Просмотр справочников</a>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>