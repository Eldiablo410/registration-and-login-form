<!DOCTYPE html>
<html>

<head>
  <title>Registration Page</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="container">
    <h1>Register Now!</h1>
    <p>If you're already registred, please go to the
    <a href="login.php">Login Page</a>.</p>
    <form action="process.php" method="post">
      <label for="username">Username:</label>
      <input type="text" id="userName" name="username" required>

      <label for="email">E-mail:</label>
      <input type="email" id="eMail" name="email" required>

      <label for="password">Password:</label>
      <input type="password" id="passsWord" name="password" required>

      <label for="confirm-password">Confirm Password:</label>
      <input type="password" id="confirmPassword" name="confirm-password" required>

      <button type="submit">Register</button>
    </form>
  </div>
</body>
</html>