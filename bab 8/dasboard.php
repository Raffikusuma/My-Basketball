<?php
include 'includes/koneksi.php';

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
    <link rel="stylesheet" href="dasboard.css">
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
    
    <section class="hero">
    <div class="hero-image">
        <div class="text-content">
            <br>
            <h2>MY BASKETBALL</h2>
            <div class="button-group">
                <a href="pemain.php" class="submenu-btn">PEMAIN</a>
                <button class="submenu-btn">LAPANGAN</button>
                <button class="submenu-btn">TIM</button>
                <button class="submenu-btn">PERTANDINGAN</button>
            </div>
            <p><strong>Find Anything About Basketball</strong></p>
        </div>
    </div>
</section>


    <div id="snackbar">Selamat datang, <?php echo $_SESSION['username']; ?>!</div>

    <script src="dasboard.js"></script>
</body>
</html>
