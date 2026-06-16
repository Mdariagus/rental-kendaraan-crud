<?php
include '../config/koneksi.php';
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
    <title>Form Pengajuan</title>

    <link rel="stylesheet" href="../assets/css/customer.css">

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

    <!-- FORM PENGAJUAN START -->
<div class="form-container">

    <h1>Form Pengajuan</h1>

    <form id="formPengajuan" action="submitPengajuan.php" method="POST">

        <label>Merk Mobil</label>
        <select name="merk" id="merk" required>

            <option value="">Pilih Merk Mobil</option>

            <?php
            $query = mysqli_query($koneksi,
            "SELECT DISTINCT merk FROM kendaraan");

            while($data = mysqli_fetch_assoc($query)){
            ?>

            <option value="<?= $data['merk']; ?>">
                <?= $data['merk']; ?>
            </option>

            <?php } ?>

        </select>

        <label>ID Mobil</label>
        <select name="id_kendaraan" id="id_kendaraan" required>

            <option value="">
                Pilih Merk Terlebih Dahulu
            </option>

        </select>

        <label>Jaminan</label>
        <select name="jaminan" id="jaminan" required>

            <option value="">Pilih Jaminan</option>
            <option value="KTP">KTP</option>
            <option value="SIM">SIM</option>
            <option value="PASSPORT">Passport</option>

        </select>

        <label>Tanggal Sewa</label>
        <input type="date" name="tgl_sewa" required>

        <label>Tanggal Kembali</label>
        <input type="date" name="tgl_kembali" required>

        <button type="submit">
            AJUKAN PEMESANAN
        </button>

    </form>

</div>

    <!-- FORM PENGAJUAN END -->

<script src="../JavaScript/form_pengajuan.js"></script>

</body>
</html>