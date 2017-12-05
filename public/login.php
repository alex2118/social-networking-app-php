<?php

  session_start();

  include('../config/dbh.php');

  $username = $_POST['username'];
  $password = $_POST['password'];

  $error_arr = [
    'username' => NULL,
    'password' => NULL
  ];

  if (empty($password)) {
    $error_arr['password'] = 'Password field is empty. Please enter a password.';
  } else if (strlen($password) < 8 ) {
    $error_arr['password'] = 'Password is too short!';
  } else {
    $password = md5($password);
  }



  if (empty($username)) {
    $error_arr['username'] = 'Username field is empty. Please enter a username.';
  } else if (strlen($username) < 6 ) {
    $error_arr['username'] = 'Username is too short!';
  } else {
    $sql = "SELECT username FROM users WHERE username = '$username' LIMIT 1";
    $res = mysqli_query($conn, $sql);

    if ($row = mysqli_fetch_assoc($res)) {

      $username = $row['username'];

      $sql = "SELECT user_id, password FROM users WHERE username = '$username' AND password = '$password' LIMIT 1";
      $res = mysqli_query($conn, $sql);

      if (!$row = mysqli_fetch_assoc($res)) {
        $error_arr['password'] = 'Incorrect password.';
      } else {
        $_SESSION['id'] = $row['user_id'];
      }

    } else {
      $error_arr['username'] = 'Username does not exist.';

      if (empty($password)) {
        $error_arr['password'] = 'Password field is empty. Please enter a password.';
      } else if (strlen($password) < 8 ) {
        $error_arr['password'] = 'Password is too short!';
      }
    }
  }

  echo json_encode($error_arr);

  // if (!isset($error_arr['username']) && !isset($error_arr['password'])) {
  //     $_SESSION['id'] = $user_id;
  // }
