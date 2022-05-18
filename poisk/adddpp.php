

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/styles/style.css">
    <link rel="stylesheet" href="/styles/forms.css">
    <link rel="stylesheet" href="/styles/table.css">
    <title>About us</title>
</head>
<body>
    <?php 
        require_once './header.html';
    ?>
    
    <div class="contain">
        <h3>Найти данные по плану</h3>
        <form action="add_ppplan.php" method="post">
            <p>ID плану</p>
            <div class="dws-input">
                <input type="number" name="id">
            </div>
            <button type="submit">Найти данные по плану</button>
        </form>
    </div>
 
        
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </body>
</html> 
