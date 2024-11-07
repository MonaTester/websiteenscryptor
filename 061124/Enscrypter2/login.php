<?php
$conn = mysqli_connect("localhost", "root", "", "user_registration");

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        echo "<script>alert('Login successful!'); window.location.href = 'Index.html';</script>";
    } else {
        echo "<script>alert('Invalid username or password.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style2.css">
    <title>Login</title>
</head>
<body>
<div class="box">
    <form action="login.php" method="POST" id="login-form">
        <h1>Login Form</h1>
        <label for="username">Username:</label><br>
        <input type="text" name="username" id="username" required><br>
        
        <label for="password">Password:</label><br>
        <input type="password" name="password" id="password" required><br><br>
        
        <label>
            <input type="checkbox" id="terms"> I accept the terms and conditions
        </label><br><br>
        
        <input type="submit" name="login" value="Login">

        
        <p>Don't have an account? <a href="registration.php">Register here</a></p>
    </form>
</div>
<script src="script.js"></script>
</body>
</html>
