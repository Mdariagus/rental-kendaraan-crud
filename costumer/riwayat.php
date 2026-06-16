<?php
// Set session cookie lifetime to 0, setelah browser ditutup, session akan hilang 
ini_set('session.cookie_lifetime', 0);
session_start();

// Cek apakah session customer_id sudah ada atau belum
if (!isset($_SESSION['customer_id'])) {
    // Jika belum login, paksa lempar kembali ke halaman login
    header("location:login.php?pesan=belum login");
    exit(); 
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RIWAYAT TRANSAKSI</title>
    <link rel="stylesheet" href="../assets/css/customer.css" />
</head>
<body>
    <!-- NAVBAR START -->
    <nav class="navbar-container">
        <div class="user-info">
        <img src="../assets/img/user.png" alt="">
        <h2><?= $_SESSION['customer_nama']; ?></h2>
        </div>
        <div class="navbar">
            <a href="index.php">LIST MOBIL</a>
            <a href="form_pengajuan.php">FORM PENGAJUAN</a>
            <a href="riwayat.php">RIWAYAT</a>
        </div>
    </nav>
    <!-- NAVBAR END -->

    <!-- RIWAYAT START -->
    <table>
        <thead>
            <tr>
                <th>NO TIKET</th>
                <th>ID KENDARAAN</th>
                <th>TANGGAL SEWA</th>
                <th>TANGGAL KEMBALI</th>
                <th>BIAYA POKOK</th>
                <th>TOTAL HARGA SEWA</th>
                <th>JAMINAN</th>
                <th>STATUS TRANSAKSI</th>
            </tr>
        </thead>

        <tbody>
            <?php 
                include '../config/koneksi.php';

                $data = mysqli_query($koneksi, "SELECT transaksi.*, kendaraan.merk, kendaraan.harga_sewa FROM transaksi INNER JOIN kendaraan ON transaksi.id_kendaraan = kendaraan.id_kendaraan");
                while ($d = mysqli_fetch_array($data)) {
            ?>
            <tr>
                <td>TX<?php echo str_pad($d['id_transaksi'], 3, '0', STR_PAD_LEFT); ?></td>
                <td><?php echo $d['id_kendaraan'];?></td>
                <td><?php echo $d['tanggal_sewa'];?></td>
                <td><?php echo $d['tanggal_kembali']; ?></td>
                <td><?php echo $d['harga_sewa']; ?></td>
                <td><?php echo $d['total_bayar']; ?></td>
                <td><?php echo $d['jaminan']; ?></td>
                <td><?php echo $d['status']; ?></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <!-- RIWAYAT END -->
</body>
</html>