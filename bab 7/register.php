<?php
session_start();
$conn = new mysqli("localhost", "root", "", "db_mybasketball");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Cek apakah username sudah ada
    $checkQuery = "SELECT username FROM admin WHERE username = ?";
    $checkStmt = $conn->prepare($checkQuery);
    $checkStmt->bind_param("s", $username);
    $checkStmt->execute();
    $checkStmt->store_result();

    if ($checkStmt->num_rows > 0) {
        echo "Username sudah digunakan. Silakan gunakan username lain.";
        exit();
    }

    // Jika username belum terdaftar, masukkan data baru
    $query = "INSERT INTO admin (username, password) VALUES (?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $username, $hashedPassword);

    if ($stmt->execute()) {
        $_SESSION['register_success'] = "Pendaftaran berhasil! Silakan login.";
        header("Location: ./login.php");
        exit();
    } else {
        echo "Terjadi kesalahan saat pendaftaran.";
    }
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
    <div class="login-container">
        <form class="login-box" method="POST" action="">
            <h2>Register</h2>
            <?php if (isset($error)) { echo "<p style='color:red;'>$error</p>"; } ?>
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
                <a href="login.php">Sudah punya akun? Login di sini</a>
            </div>
        </form>
    </div>
</body>
</html>
