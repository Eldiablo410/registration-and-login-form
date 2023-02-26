<?php

// Include the database connection file
require_once('connection.php');

// Get the form data from the POST request
$name = $_POST['name'];
$email = $_POST['email'];
$password = hash('sha256', $_POST['password']);

// Insert the new user into the database
$stmt = mysqli_prepare($conn, 'INSERT INTO users (name, email, password) VALUES (?, ?, ?)');
mysqli_stmt_bind_param($stmt, 'sss', $name, $email, $password);
mysqli_stmt_execute($stmt);

// Send an email confirmation to the user
$to = $email;
$subject = 'Registration Confirmation';
$message = "Thank you for registering, $name!";
$headers = 'From: mywebsite@example.com';
mail($to, $subject, $message, $headers);

// Close the database connection
mysqli_stmt_close($stmt);
mysqli_close($conn);

// Redirect the user to the confirmation page
header('Location: confirmation.php');
exit();

?>
