<?php

  $hostname = "localhost";
  $username = "root";
  $password = "Arabella01212016";
  $database = "alpha_db";

  // Create connection
  $conn = mysqli_connect($hostname, $username, $password, $database);

  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
