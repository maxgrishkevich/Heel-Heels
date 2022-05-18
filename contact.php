<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require("./PHPMailer-master/src/PHPMailer.php");
require("./PHPMailer-master/src/SMTP.php");

$error = '';
$name = '';
$email = '';
$subject = '';
$message = '';
function clean_text($string){
  $string = trim($string);
  $string = stripslashes($string);
  $string = htmlspecialchars($string);
  return $string;
}
if(isset($_POST['submit'])){
  if(empty($_POST['name'])){
      $error .= '<p><label class="text-danger">Пожалуйста, введите Ваше имя</label></p>';
  }else{
      $name = clean_text($_POST['name']);
      if(!preg_match("/^[a-zA-z ]*$/",$name)){
        $error .= '<p><label class="text-danger">Недопустимые символы</label></p>';
      }
  }

  if(empty($_POST['email'])){
    $error .= '<p><label class="text-danger">Пожалуйста, введите Ваше имя</label></p>';
  }else{
    $email = clean_text($_POST['email']);
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
      $error .= '<p><label class="text-danger">Неправильный формат e-mail</label></p>';
    }
  } 

  if(empty($_POST['message'])){
    $error .= '<p><label class="text-danger">Пожалуйста, введите Ваше сообщение</label></p>';
  }else{
    $message = clean_text($_POST['message']);
  }
  if($error != ''){
    require 'class/class.phpmailer.php';
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->Host = 'smtpout.secureserver.net';
    $mail->Port = '50';
    $mail->SMTPAuth = true;
    $mail->Username = 'Write your SMTP username';
    $mail->Password = 'SMTP Password';
    $mail->SMTPSecure = '';
    $mail->From = $_POST['email'];
    $mail->FromName = $_POST["name"];
    $mail->AddAddress('romaniv.roma2013@gmail.com', 'Name');
    $mail->AddCC($_POST["email"],$_POST['name']);
    $mail->IsHTML(true);
    $mail->Subject = "From Heels&Heel";
    $mail->Body = $_POST['message'];

    if($mail->Send()){
      $error = '<label class="text-success">Спасибо за вашу обратную связь</label>';
    }else{
      $error = '<label class="text-danger">Возникла ошибка :(</label>';
    }
    $name = '';
    $email = '';
    $subject = '';
    $message = '';
  }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/src/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="./styles/style.css">
    <title>Contact Us</title>
</head>
<body>
<div class="header">
  <a href="./index.html" ><img class="logo" src="./src/logo.png" alt=""></a>
  <div class="header-right">
    <a  href="./index.html">Главная</a>
    <a href="./contact.php" class="active">Написать нам</a>
    <a href="./about.php">О программе</a>
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
      <section class="contact container">
        <div class="bubble b1"></div>
        <div class="bubble b2"></div>
          <h1>Связатся с нами через e-mail</h1>
          <?php echo $error; ?>
            <form method="post">
          <div class="row">
              <input class="name col-md-5" type="text" placeholder="Ваше Имя" value="<?php echo $name; ?>">
              <div class="col-md-1"></div >
              <input class="email col-md-6" type="email" placeholder="Ваш Email" value="<?php echo $mail; ?>">
          </div>
          <div class="row ">
              <!-- <input class="message col-md-12" type="text" placeholder="Ваше Сообщение"> -->
              <textarea class="form-control message" id="exampleFormControlTextarea1" rows="6" placeholder="Ваше сообщение" value="<?php echo $message; ?>"></textarea>

          </div>
          <div class="row">
              <!-- <button class="button">Отправить</button> -->
              <button class="button" style="vertical-align:middle"><span>Отправить </span></button>
            </div>
            </form>
      </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="app.js"></script>
</body>
</html>