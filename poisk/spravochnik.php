<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="/src/favicon.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/styles/style.css">
    <link rel="stylesheet" href="/styles/table.css">
    <title>About us</title>

</head>

<body>
    <?php 
        require_once './header.html';
    ?>
    <div class="bubble b1"></div>
    <div class="bubble b2"></div>
    <h2 class="text-center">Вивод данных по плану</h2>
    <br><br>
    <h3 class="text-center">---Довідник фасону</h3>
    <table class="center">
        <tr>
            <th>ID</th>
            <th>Назва</th>
        </tr>
    <?php
    require_once '../connect.php';
    $fason = mysqli_query($connect,"SELECT * FROM `довідник фасону`");
    $fason = mysqli_fetch_all($fason);
    foreach ($fason as $fasonn ) {
        ?>
        <tr>
            <td><?= $fasonn[0] ?></td>
            <td><?= $fasonn[1] ?></td>
        </tr>
        <?php
    }
    ?>
    </table>
    <br>
    <h3 class="text-center">---Довідник продукції</h3>
    <table class="center">
    <tr>
        <th>ID</th>
        <th>Назва</th>
    </tr>
    <?php
        $dproduct = mysqli_query($connect,"SELECT * FROM `довідник продукції`");
    $dproduct = mysqli_fetch_all($dproduct);
    foreach ($dproduct as $dproductt ) {
        ?>
        <tr>
            <td><?= $dproductt[0] ?></td>
            <td><?= $dproductt[1] ?></td>
        </tr>
        <?php
    }
    ?>
    </table>
    <br>
    <h3 class="text-center">---Довідник сировини</h3>
    <table class="center">
    <tr>
        <th>ID</th>
        <th>Назва</th>
    </tr>
    <?php
    $dsyrovin = mysqli_query($connect,"SELECT * FROM `довідник сировини`");
    $dsyrovin = mysqli_fetch_all($dsyrovin);
    foreach ($dsyrovin as $dsyrovinn ) {
        ?>
        <tr>
            <td><?= $dsyrovinn[0] ?></td>
            <td><?= $dsyrovinn[1] ?></td>
        </tr>
        <?php
    }
    ?>
    </table>
    <br>
    <h3 class="text-center">---Нормативний список</h3>
    <table class="center">
    <tr>
        <th>ID фасону</th>
        <th>ID сировини</th>
        <th>Норма витрат</th>
    </tr>
    <?php
    $norma = mysqli_query($connect,"SELECT * FROM `нормативний список`");
    $norma = mysqli_fetch_all($norma);
    foreach ($norma as $normaa ) {
        ?>
        <tr>
            <td><?= $normaa[0] ?></td>
            <td><?= $normaa[1] ?></td>
            <td><?= $normaa[2] ?></td>
        </tr>
        <?php
    }
    ?>
    </table><br>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>