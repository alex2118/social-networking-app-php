<?php

  session_start();

  include('../config/dbh.php');

  $username = strip_tags($_POST['username']);
  $email = strip_tags($_POST['email']);
  $password = strip_tags($_POST['password']);
  $confirm_password = strip_tags($_POST['confirm-password']);

  $username = stripslashes($_POST['username']);
  $email = stripslashes($_POST['email']);
  $password = stripslashes($_POST['password']);
  $confirm_password = stripslashes($_POST['confirm-password']);

  $username = mysqli_real_escape_string($conn, $username);
  $email = mysqli_real_escape_string($conn, $email);
  $password = mysqli_real_escape_string($conn, $password);
  $confirm_password = mysqli_real_escape_string($conn, $confirm_password);

  $error_arr = [
    'username' => NULL,
    'email' => NULL,
    'password' => NULL,
    'confirm_password' => NULL
  ];

  // $sql = "SELECT username FROM users WHERE username = '$username' LIMIT 1";
  // $res = mysqli_query($conn, $sql);

  if (empty($username)) {
    $error_arr['username'] = 'Username field is empty. Please enter a username.';
  } else if (strlen($username) < 6) {
    $error_arr['username'] = 'Username should be at least 6 characters long.';
  } else if (preg_match('/[^A-Za-z0-9]/', $username)) {
    $error_arr['username'] = 'Username should only contain letters and numbers.';
  }

  // if (mysqli_num_rows($res) > 0) {
  //   $error_arr[] = 'Username is already taken.';
  // }

  if (empty($email)) {
    $error_arr['email'] = 'Email field is empty. Please enter an email address.';
  } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error_arr['email'] = 'Please enter a valid email address.';
  }

  if (empty($password)) {
    $error_arr['password'] = 'Password field is empty. Please enter a password.';
  } else if (strlen($password) < 8 ) {
    $error_arr['password'] = 'Password is too short!';
  }

  if (empty($confirm_password)) {
    $error_arr['confirm_password'] = 'Please confirm password.';
  } else if (strlen($confirm_password) < 8) {
    $error_arr['confirm_password'] = 'Confirm password is too short!';
  } else if ($password != $confirm_password) {
    $error_arr['confirm_password'] = 'Password does not match.';
  }

  echo json_encode($error_arr);

  if (!isset($error_arr['username']) && !isset($error_arr['email']) && !isset($error_arr['password']) && !isset($error_arr['confirm_password'])) {

    $password = md5($password);

    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
    mysqli_query($conn, $sql);

    $sql = "SELECT user_id FROM users WHERE username = '$username' AND password = '$password' LIMIT 1";
    $res = mysqli_query($conn, $sql);

    if ($row = mysqli_fetch_assoc($res)) {
      $user_id = $row['user_id'];

      $_SESSION['id'] = $user_id;
    }

  }
