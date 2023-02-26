<?php

//Database Connection
$host = 'localhost';
$username = 'your_username';
$password = 'your_password';
$db = 'your_database';

//Create Database Connection
$conn = mysqli_connect($host, $username, $password, $db);

//Check for errors on connection
if (!$conn) {
  die('Failed to connect to MySQL: ' . mysqli_connect_error());
}

?>