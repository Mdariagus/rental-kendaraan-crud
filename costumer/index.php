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
    <title>Document</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/customer.css" />

    <!-- AJAX START -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- AJAX END -->
    
</head>
<body>
    <!-- NAVBAR START -->
    <nav class="navbar-container">
        <div class="user-info">
        <img src="../assets/img/user.png" alt="">
        <h2><?= $_SESSION['customer_nama']; ?></h2>
        </div>
        <div class="navbar">
            <a href="#">LIST MOBIL</a>
            <a href="form_pengajuan.php">FORM PENGAJUAN</a>
            <a href="">RIWAYAT</a>
        </div>
    </nav>
    <!-- NAVBAR END -->

    <!-- HERO SECTION START -->
    <?php
include '../config/koneksi.php';

    $query = mysqli_query($koneksi, "SELECT * FROM kendaraan");
?>
<section class="card-container">
    <?php while($k = mysqli_fetch_assoc($query)) { ?>
    <div class="card-mobil">
        <div class="card-header">
            <span class="id-mobil">
                <?= $k['id_kendaraan']; ?>
            </span>
            <?php if($k['status'] == 'Tersedia') { ?>
                <span class="status tersedia">Tersedia</span>
            <?php } else { ?>
                <span class="status disewa">Disewa</span>
            <?php } ?>
        </div>
        <h3>
            <?= $k['merk']; ?>
        </h3>
        <div class="gambar-mobil">
            <?php if(!empty($k['gambar'])) { ?>
                <img src="../assets/img/kendaraan/<?= $k['gambar']; ?>">
            <?php } ?>
        </div>
        <div class="info-harga">
            <div class="label-harga">
                Harga sewa pokok
            </div>

            <div class="harga">
                Rp <?= number_format($k['harga_sewa'],0,',','.'); ?> <span>/hari</span>
            </div>
        </div>
        <a href="#" class="btn-sewa">
            Sewa Sekarang
        </a>
    </div>
    <?php } ?>
</section>
    <!-- HERO SECTION END -->
</body>
</html>