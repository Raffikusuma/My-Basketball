<?php
include 'includes/koneksi.php';
$servername = 'localhost';
$username = 'root';
$password = ''; // tanpa spasi kosong
$database = 'db_mybasketball';

// membuat koneksi
$koneksi = mysqli_connect($servername, $username, $password, $database);

// mengecek koneksi
if(!$koneksi) {
    die('Connection Failed: ' . mysqli_connect_error());
}
?>
