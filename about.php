<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/src/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="stylesheet" href="./styles/table.css">
    <title>About us</title>
</head>
<body>
  <div class="header">
    <a href="./index.html" ><img class="logo" src="./src/logo.png" alt=""></a>
    <div class="header-right">
      <a href="./index.html">Главная</a>
      <a href="./contact.php">Написать нам</a>
      <a href="./about.php" class="active">О программе</a>
      <div class="dropdown show">
        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          База Данных
        </a>
                    
        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          <a class="dropdown-item" href="/add/add.php">Создать план</a>
          <a class="dropdown-item" href="/edit_delete/edit_delete.php">Редактировать</a>
          <a class="dropdown-item" href="/poisk/vibor.php">Поиск по БД</a>
        </div>
      </div>
    </div>
  </div>
  <div class="back3">
    <div class="bubble b1"></div>
        <div class="bubble b2"></div>
    <div class="main container">
      <h1>О программе</h1>
    </div>
  </div>
  <div class="container">
    <section class="about row ">
      <img class="col-md-3" src="./src/cabluc.jpg" alt="">

      <div class="text">
        <div class="description col-md-9">
          <h2>Как пользоваться</h2>
          <p>На главном меню сайте приветсвует три ссылки: "Создать план", "Просмотр/ редактирование/ удаление данных", "Поиск данных". Нажимаю кнопку, мы переходим соответсвенно к названию к источнику, где работаем с найшей базой данных. База данных представлена в табличках. </p>
      </div>
    </div>
    </section>
    <section class="about row">
      <div class="text col-md-9">
        <div class="description">
          <h2>Как добавлять данные в БД</h2>
          <p>Для того чтобы добавить свои данные в нашу базу данных, сначала нам нужно перейти в главное меню на шапке сайта "Главная", после этого мы увидим внизу сайта три кнопки, если мы хотим создать новый план, левой кнопкой миши нажимаем на ссылку "Создаь план", после чего мы увидим форму которую нужно заполнить.</p>
        </div>
    </div>

      <img class="col-md-3" src="./src/завод.jpg" alt="">

    </section>
  </div>

  <script src="app.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>