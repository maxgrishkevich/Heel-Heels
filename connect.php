<?php
    $connect = mysqli_connect('localhost', 'root','root','підприємство2');

  // Check connection
  if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
  }
?>