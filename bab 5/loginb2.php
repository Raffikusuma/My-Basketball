<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validasi username dan password
    if ($username == 'user@example.com' && $password == 'password') {
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Username atau password salah.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="loginb2.css">
</head>
<body>
    <header>
        <div class="menu-icon">
            <span>&#9776;</span>
        </div>
    </header>

    <div class="login-container">
        <form class="login-box" method="POST" action="loginb2.php">
            <h2>Login</h2>
            <?php 
            if (isset($error)) { 
                echo "<p style='color:red;'>$error</p>"; 
            } 
            if (isset($_SESSION['register_success'])) { 
                echo "<p style='color:green;'>{$_SESSION['register_success']}</p>"; 
                unset($_SESSION['register_success']); 
            }
            ?>
            <div class="input-group">
                <label for="username">Username or email Address</label>
                <input type="text" id="username" name="username" placeholder="Enter Username or Email" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter Password" required>
            </div>
            <button type="submit" class="login-btn">LOGIN</button>
            <div class="extra-links">
                <a href="register.php">Register</a> | Lupa Password?
            </div>
        </form>
    </div>
</body>
</html>
