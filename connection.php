<?php

//Database Connection
$host = 'localhost';
$username = 'your_username';
$password = 'your_password';
$dbname = 'your_database';

//Create Database Connection
$conn = mysqli_connect($host, $username, $password, $dbname);

//Check for errors on connection
if (!$conn) {
  die('Failed to connect to MySQL: ' . mysqli_connect_error());
}

?>