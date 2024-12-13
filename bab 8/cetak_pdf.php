<?php
// Koneksi ke database
include('C:/laragon/www/Bab 2/koneksi.php');
 // Sesuaikan jalur sesuai lokasi file koneksi.php
require_once('dompdf/autoload.inc.php');  // Sesuaikan jalur Dompdf

use Dompdf\Dompdf;

$dompdf = new Dompdf();

// Ambil data pemain dari database
$query = mysqli_query($koneksi, "SELECT * FROM pemain");
$html = '<center><h3>Daftar Pemain Basket</h3></center><hr/><br>';
$html .= '<table border="1" width="100%">
            <tr>
                <th>No</th>
                <th>Nama Pemain</th>
                <th>Posisi</th>
                <th>Tim</th>
            </tr>';

$no = 1;
while ($row = mysqli_fetch_array($query)) {
    $html .= "<tr>
                <td>" . $no . "</td>
                <td>" . $row['nama_pemain'] . "</td>
                <td>" . $row['posisi'] . "</td>
                <td>" . $row['tim'] . "</td>
              </tr>";
    $no++;
}

$html .= "</table>";

// Load HTML ke Dompdf
$dompdf->loadHtml($html);

// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'potrait');

// Render HTML ke PDF
$dompdf->render();

// Melakukan output file PDF
$dompdf->stream('laporan_data_pemain_basket.pdf');
?>
