<?php
require_once('connection.php');

// Define variables and set to empty values
$username = $email = $password = '';
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = hash('sha256', $_POST['password']);

    // Check if username or email already exist in database
    $sql = "INSERT INTO Users(userName, eMail, passWord)
    VALUES('$username', '$email', '$password')";
    if(mysqli_query($conn, $sql)) {
        $message = "New Record Created Successfully";
    } else {
        $message = "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Registration Result</title>
    <link rel="stylesheet" type="text/css" href="registrationresult.css">
</head>
<body>
    <div class="container">
        <h1>Registration Result</h1>
        <p><?php echo $message ?></p>
        <a href="index.html"><button>Back to Home</button></a>
        <a href="login.php"><button>Login</button></a>
    </div>
</body>
</html>