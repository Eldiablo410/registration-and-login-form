<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <link rel="stylesheet" href="loginstyle.css">
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <form method="POST" action="process_login.php">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" required>
            </div>
            <div class="form-group">
                <input type="checkbox" id="remember-me" name="remember-me">
                <label for="remember-me">Remember me</label>
            </div>
            <div class="form-group">
                <a href="forgotpass.php">Forgot Password</a>
            </div>
            <div class="form-group">
                <button type="submit">Login</button>
            </div>
        </form>
    </div>
</body>
</html>
