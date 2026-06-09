<?php

include "../../koneksi.php";

$id = $_GET['id'];

$transaksi = mysqli_query(
$koneksi,
"SELECT * FROM transaksi
WHERE id_transaksi='$id'"
);

$t = mysqli_fetch_array($transaksi);

mysqli_query($koneksi,"
UPDATE transaksi
SET status='Disetujui'
WHERE id_transaksi='$id'
");

mysqli_query($koneksi,"
UPDATE kendaraan
SET status='Disewa'
WHERE id_kendaraan='$t[id_kendaraan]'
");

header("Location:index.php");
exit;