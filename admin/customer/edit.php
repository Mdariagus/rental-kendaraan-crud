<?php
include "../../koneksi.php";
include "../partials/sidebar.php";

$id   = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM customer WHERE id_customer='$id'");
$d    = mysqli_fetch_assoc($data);

if(isset($_POST['update'])){
    mysqli_query($koneksi, "
    UPDATE customer SET
    nama='$_POST[nama]',
    alamat='$_POST[alamat]',
    no_hp='$_POST[no_hp]'
    WHERE id_customer='$id'
    ");
    header("Location:index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Customer</title>
</head>
<body>

<div class="main-content">
    <a href="index.php" class="btn-back">← Kembali</a>
    <div class="page-title">Edit Customer</div>

    <div class="form-card">
        <form method="POST">
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" value="<?= htmlspecialchars($d['nama']) ?>" required>
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <textarea name="alamat" required><?= htmlspecialchars($d['alamat']) ?></textarea>
            </div>
            <div class="form-group">
                <label>No HP</label>
                <input type="text" name="no_hp" value="<?= htmlspecialchars($d['no_hp']) ?>" required>
            </div>
            <button type="submit" name="update" class="btn-submit">Update Data</button>
        </form>
    </div>
</div>

</body>
</html>
