<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Logika untuk menyimpan data pengguna ke database dapat ditambahkan di sini

    // Untuk keperluan contoh, langsung arahkan ke halaman login
    $_SESSION['register_success'] = "Pendaftaran berhasil! Silakan login.";
    header("Location: loginb2.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="loginb2.css">
</head>
<body>
    <header>
        <div class="menu-icon">
            <span>&#9776;</span>
        </div>
    </header>

    <div class="login-container">
        <form class="login-box" method="POST" action="register.php">
            <h2>Register</h2>
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter Username" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter Password" required>
            </div>
            <button type="submit" class="login-btn">REGISTER</button>
            <div class="extra-links">
                <a href="loginb2.php">Sudah punya akun? Login di sini</a>
            </div>
        </form>
    </div>
</body>
</html>
