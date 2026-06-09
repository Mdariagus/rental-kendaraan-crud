<?php
include "../../koneksi.php";

if(isset($_POST['simpan'])){
    mysqli_query($koneksi, "
    INSERT INTO kendaraan VALUES(
    NULL,
    '$_POST[nama_kendaraan]',
    '$_POST[merk]',
    '$_POST[plat_nomor]',
    '$_POST[tahun]',
    '$_POST[harga_sewa]',
    '$_POST[status]'
    )");
    header("Location:index.php");
    exit;
}
?>
<?php include "../partials/sidebar.php"; ?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Kendaraan</title>
</head>
<body>

<div class="main-content">
    <a href="index.php" class="btn-back">← Kembali</a>
    <div class="page-title">Tambah Kendaraan</div>

    <div class="form-card">
        <form method="POST">
            <div class="form-group">
                <label>Nama Kendaraan</label>
                <input type="text" name="nama_kendaraan" required placeholder="Contoh: Avanza">
            </div>
            <div class="form-group">
                <label>Merk</label>
                <input type="text" name="merk" required placeholder="Contoh: Toyota">
            </div>
            <div class="form-group">
                <label>Plat Nomor</label>
                <input type="text" name="plat_nomor" required placeholder="Contoh: DK 123 BC">
            </div>
            <div class="form-group">
                <label>Tahun</label>
                <input type="number" name="tahun" required placeholder="Contoh: 2022" min="1990" max="2030">
            </div>
            <div class="form-group">
                <label>Harga Sewa (per hari)</label>
                <input type="number" name="harga_sewa" required placeholder="Contoh: 150000">
            </div>
            <div class="form-group">
                <label>Status</label>
                <select name="status">
                    <option value="Tersedia">Tersedia</option>
                    <option value="Disewa">Disewa</option>
                </select>
            </div>
            <button type="submit" name="simpan" class="btn-submit">Simpan Data</button>
        </form>
    </div>
</div>

</body>
</html>
