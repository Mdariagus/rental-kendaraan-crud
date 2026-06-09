<?php
include "../../koneksi.php";
include "../partials/sidebar.php";

$id   = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM kendaraan WHERE id_kendaraan='$id'");
$d    = mysqli_fetch_assoc($data);

if(isset($_POST['update'])){
    mysqli_query($koneksi, "
    UPDATE kendaraan SET
    nama_kendaraan='$_POST[nama_kendaraan]',
    merk='$_POST[merk]',
    plat_nomor='$_POST[plat_nomor]',
    tahun='$_POST[tahun]',
    harga_sewa='$_POST[harga_sewa]',
    status='$_POST[status]'
    WHERE id_kendaraan='$id'
    ");
    header("Location:index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Kendaraan</title>
</head>
<body>

<div class="main-content">
    <a href="index.php" class="btn-back">← Kembali</a>
    <div class="page-title">Edit Kendaraan</div>

    <div class="form-card">
        <form method="POST">
            <div class="form-group">
                <label>Nama Kendaraan</label>
                <input type="text" name="nama_kendaraan" value="<?= htmlspecialchars($d['nama_kendaraan']) ?>" required>
            </div>
            <div class="form-group">
                <label>Merk</label>
                <input type="text" name="merk" value="<?= htmlspecialchars($d['merk']) ?>" required>
            </div>
            <div class="form-group">
                <label>Plat Nomor</label>
                <input type="text" name="plat_nomor" value="<?= htmlspecialchars($d['plat_nomor']) ?>" required>
            </div>
            <div class="form-group">
                <label>Tahun</label>
                <input type="number" name="tahun" value="<?= $d['tahun'] ?>" required>
            </div>
            <div class="form-group">
                <label>Harga Sewa (per hari)</label>
                <input type="number" name="harga_sewa" value="<?= $d['harga_sewa'] ?>" required>
            </div>
            <div class="form-group">
                <label>Status</label>
                <select name="status">
                    <option value="Tersedia" <?= $d['status']=="Tersedia"?"selected":"" ?>>Tersedia</option>
                    <option value="Disewa"   <?= $d['status']=="Disewa"?"selected":"" ?>>Disewa</option>
                </select>
            </div>
            <button type="submit" name="update" class="btn-submit">Update Data</button>
        </form>
    </div>
</div>

</body>
</html>
