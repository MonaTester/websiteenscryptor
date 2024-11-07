<?php
$conn = mysqli_connect("localhost", "root", "", "user_registration");

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    
    if ($password === $confirmPassword) {
        if (preg_match('/^(?=.*[A-Z])(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$/', $password)) {
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            $query = "INSERT INTO users(username, email, password) VALUES ('$username','$email','$hashedPassword')";
            $result = mysqli_query($conn, $query);

            if ($result) {
                echo "<script>alert('Registration Successful'); window.location.href = 'login.php';</script>";
            } else {
                echo "<script>alert('Registration Failed: " . mysqli_error($conn) . "');</script>";
            }
        } else {
            echo "<script>alert('Password must be at least 8 characters long, contain 1 uppercase letter, and 1 special character.');</script>";
        }
    } else {
        echo "<script>alert('Passwords do not match.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style2.css">
    <title>Register</title>
</head>
<body>
    <div class="box">
        <form action="registration.php" method="POST" id="registration-form">
            <h1>Registration Form</h1>
            
            <label for="username">Username:</label><br>
            <input type="text" name="username" id="username" required><br>
            
            <label for="email">Email:</label><br>
            <input type="email" name="email" id="email" required><br>
            
            <label for="password">Password:</label><br>
            <input type="password" name="password" id="password" required
                   pattern="^(?=.*[A-Z])(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$"
                   title="Password must be at least 8 characters, contain 1 uppercase letter, and 1 special character."><br><br>
            
            <label for="confirm_password">Confirm Password:</label><br>
            <input type="password" name="confirm_password" id="confirm_password" required><br><br>
            
            <p><input type="checkbox" id="terms" required> I agree to the terms and conditions</p>
            <input type="submit" name="register" value="Register">
            
            <p>Already have an account? <a href="login.php">Login here</a></p>
        </form>
    </div>

    <script src="scriptpassreg.js"></script>
</body>
</html>
