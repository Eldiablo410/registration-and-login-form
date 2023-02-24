<?php

//Get the form data from the POST request
$userName = $_POST['username'];
$eMail = $_POST['email'];
$password = hash('sha256',$_POST['password']);

//Open SQLite database file
$db = new SQLite3('registration.sqlite');

//create users table if it doesn't exist already
$db->exec('CREATE TABLE IF NOT EXISTS users (id INTEGER PRIMARY KEY AUTOINCREMENT
name TEXT, email TEXT, password TEXT)');

//insert users into database
$stmt = $db->prepare('INSERT INTO users(name, email, password) VALUES (:name, :email, :password)');
$stmt->bindValue(':name', $userName);
$stmt->bindValue(':email', $eMail);
$stmt->bindValue(':password', $password);
$stmt->execute();

//send an email confirmation to user
$to = $email;
$subject = 'Registration Confirmation';
$message = "Thank you for registering, $name!";
$headers = 'From: mywebsite@example.com';
mail($to, $subject, $message, $headers);

//Redirect to confirmation page
header('Location: confirmation.php');
exit();
?>