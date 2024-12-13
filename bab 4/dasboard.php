<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: loginb2.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Basketball</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="container">
            <div class="logo">
                <h1>MY BASKETBALL</h1>
            </div>
            <div class="logout-btn">
                <a href="logout.php">
                    <button>Logout</button>
                </a>
            </div>
        </div>
    </header>
    
    <nav class="submenu">
        <div class="container">
            <button onclick="showPemainAlert()">PEMAIN</button>
        </div>
    </nav>
    
    <section class="hero">
        <div class="hero-image">
            <div class="text-content">
                <br>
                <h2>MY BASKETBALL</h2>
                <button class="submenu-btn">LAPANGAN</button>
                <button class="submenu-btn">TIM</button>
                <p><strong>Find Anything About Basketball</strong></p>
                <p>Apakah Anda ingin melihat jadwal pertandingan?</p>
                <button onclick="showPertandinganConfirm()">PERTANDINGAN</button>
                <p id="demo"></p>
            </div>
        </div>
    </section>

    <div id="snackbar">Selamat datang, <?php echo $_SESSION['username']; ?>!</div>

    <script src="dasboard.js"></script>
</body>
</html>
