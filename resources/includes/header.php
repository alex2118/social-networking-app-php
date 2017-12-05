<?php

  session_start();

  require('../config/dbh.php');

  if (isset($_SESSION['id'])) {
    $user_id = $_SESSION['id'];
    $sql = "SELECT username FROM users WHERE user_id = $user_id LIMIT 1";
    $res = mysqli_query($conn, $sql);

    if ($row = mysqli_fetch_assoc($res)) {
      $username = $row['username'];
    }
  }

 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../resources/css/style.css">
  </head>
  <body>
    <?php

      include('navbar.php');

     ?>
