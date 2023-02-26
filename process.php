<?php
require_once 'connection.php';

// Define variables and set to empty values
$username = $email = $password = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = test_input($_POST['username']);
    $email = test_input($_POST['email']);
    $password = hash('sha256', test_input($_POST['password']));

    // Check if username or email already exist in database
    $query = "SELECT * FROM users WHERE username = '$username' OR email = '$email' LIMIT 1";
    $result = mysqli_query($connection, $query);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        if ($user['username'] === $username) {
            $message = 'Username already exists';
        } else {
            $message = 'Email already exists';
        }
    } else {
        // Insert new user into database
        $query = "INSERT INTO users (username, email, password) VALUES('$username', '$email', '$password')";
        mysqli_query($connection, $query);

        // Send email confirmation
        $to = $email;
        $subject = 'Registration Confirmation';
        $message = 'Thank you for registering!';
        $headers = 'From: webmaster@example.com' . "\r\n" .
            'Reply-To: webmaster@example.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
        mail($to, $subject, $message, $headers);

        // Redirect to confirmation page
        header('Location: confirmation.php');
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}