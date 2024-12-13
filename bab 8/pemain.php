<?php
include 'includes/koneksi.php';

// Koneksi ke database
$conn = new mysqli('localhost', 'root', '', 'db_mybasketball');
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Proses hapus data
if (isset($_GET['hapus'])) {
    $id_pemain = $_GET['hapus'];

    $query = "DELETE FROM pemain WHERE id_pemain = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id_pemain);

    if ($stmt->execute()) {
        echo "<script>alert('Data berhasil dihapus!'); window.location.href='pemain.php';</script>";
    } else {
        echo "<script>alert('Data gagal dihapus!');</script>";
    }

    $stmt->close();
}

// Proses tambah data
if (isset($_POST['tambah'])) {
    $nama_pemain = $_POST['nama_pemain'];
    $posisi = $_POST['posisi'];
    $tim = $_POST['tim'];

    $query = "INSERT INTO pemain (nama_pemain, posisi, tim) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sss", $nama_pemain, $posisi, $tim);

    if ($stmt->execute()) {
        echo "<script>alert('Data berhasil ditambahkan!'); window.location.href='pemain.php';</script>";
    } else {
        echo "<script>alert('Data gagal ditambahkan!');</script>";
    }

    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pemain Basket</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('dasboard.jpeg'); /* Pastikan file ini tersedia di folder proyek */
            background-size: cover;
            background-position: center;
            color: white;
        }
        .container {
            background: rgba(0, 0, 0, 0.7);
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
        }
        table {
            color: white;
        }
        .btn-dashboard {
            background-color: burlywood;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h1 class="text-center">Daftar Pemain Basket</h1>

        <!-- Tombol Kembali ke Dashboard -->
        <a href="dasboard.php" class="btn btn-dashboard mb-4">Kembali ke Dashboard</a>

        <!-- Form Tambah Data -->
        <form method="POST" class="mb-4">
            <div class="row">
                <div class="col-md-3">
                    <input type="text" name="nama_pemain" placeholder="Nama Pemain" class="form-control" required>
                </div>
                <div class="col-md-3">
                    <input type="text" name="posisi" placeholder="Posisi" class="form-control" required>
                </div>
                <div class="col-md-3">
                    <input type="text" name="tim" placeholder="Tim" class="form-control" required>
                </div>
                <div class="col-md-3">
                    <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
                </div>
            </div>
        </form>

        <!-- Tabel Data Pemain -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama Pemain</th>
                    <th>Posisi</th>
                    <th>Tim</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $conn->query("SELECT * FROM pemain");
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['nama_pemain']}</td>
                            <td>{$row['posisi']}</td>
                            <td>{$row['tim']}</td>
                            <td>
                                <a href='pemain.php?hapus={$row['id_pemain']}' class='btn btn-danger btn-sm' onclick=\"return confirm('Yakin ingin menghapus data?')\">Hapus</a>
                            </td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>

        <!-- Tombol Cetak PDF -->
        <a href="cetak_pdf.php" class="btn btn-success">Cetak PDF</a>
    </div>
</body>
</html>
