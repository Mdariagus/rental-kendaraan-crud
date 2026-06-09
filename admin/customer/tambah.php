<?php
include "../../koneksi.php";

if(isset($_POST['simpan'])){
    mysqli_query($koneksi, "
    INSERT INTO customer (nama, alamat, no_hp)
    VALUES ('$_POST[nama]', '$_POST[alamat]', '$_POST[no_hp]')
    ");
    header("Location:index.php");
    exit;
}
?>
<?php include "../partials/sidebar.php"; ?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Customer</title>
</head>
<body>

<div class="main-content">
    <a href="index.php" class="btn-back">← Kembali</a>
    <div class="page-title">Tambah Customer</div>

    <div class="form-card">
        <form method="POST">
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" required placeholder="Nama lengkap customer">
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <textarea name="alamat" required placeholder="Alamat lengkap"></textarea>
            </div>
            <div class="form-group">
                <label>No HP</label>
                <input type="text" name="no_hp" required placeholder="Contoh: 08123456789">
            </div>
            <button type="submit" name="simpan" class="btn-submit">Simpan Data</button>
        </form>
    </div>
</div>

</body>
</html>
