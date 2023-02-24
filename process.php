<?php

//Connect to database
$serverName = "localhost";
$userName = "michealegan93";
$passWord = "letmein23";
$dbName = "registration23";

$hashedPass = hash('sha256',$passWord);

$con = new mysqli($serverName, $userName, $hashedPass, $dbName);

if($con -> connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//Get the form data
$username = $_POST["userName"];
$email = $_POST["email"];
$password = $_POST["password"];

//Insert data into Database
$sql = "INSERT INTO Registration(userName, eMail, passWord) VALUES ('$username', '$email', '$password')";

if($con->query($sql) === TRUE) {
  //successful query
  //Send confirmation email to the user
  $to = $email
  $subject = "Registration Confirmation"
  $message = "Thank you for registering!";
  $headers = "From: yourname@randomwebsite.com";

  mail($to, $subject, $message, $headers);

  //redirect to confirmation page
  header("Location: confirmation.php");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$con->close();
?>