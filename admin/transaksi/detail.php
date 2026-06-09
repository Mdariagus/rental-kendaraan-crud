<?php

include "../../koneksi.php";

$id = $_GET['id'];

$data = mysqli_query($koneksi,"
SELECT
    t.*,
    c.nama,
    c.alamat,
    c.no_hp,
    k.nama_kendaraan,
    k.merk,
    k.plat_nomor

FROM transaksi t

JOIN customer c
ON t.id_customer=c.id_customer

JOIN kendaraan k
ON t.id_kendaraan=k.id_kendaraan

WHERE t.id_transaksi='$id'
");

$d=mysqli_fetch_array($data);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Detail Transaksi</title>
</head>
<body>

<h2>Detail Transaksi</h2>

<a href="index.php">Kembali</a>

<br><br>

<table border="1" cellpadding="10">

<tr>
<td>ID Transaksi</td>
<td><?= $d['id_transaksi'] ?></td>
</tr>

<tr>
<td>Customer</td>
<td><?= $d['nama'] ?></td>
</tr>

<tr>
<td>No HP</td>
<td><?= $d['no_hp'] ?></td>
</tr>

<tr>
<td>Alamat</td>
<td><?= $d['alamat'] ?></td>
</tr>

<tr>
<td>Kendaraan</td>
<td><?= $d['nama_kendaraan'] ?></td>
</tr>

<tr>
<td>Merk</td>
<td><?= $d['merk'] ?></td>
</tr>

<tr>
<td>Plat Nomor</td>
<td><?= $d['plat_nomor'] ?></td>
</tr>

<tr>
<td>Tanggal Sewa</td>
<td><?= $d['tanggal_sewa'] ?></td>
</tr>

<tr>
<td>Tanggal Kembali</td>
<td><?= $d['tanggal_kembali'] ?></td>
</tr>

<tr>
<td>Lama Sewa</td>
<td><?= $d['lama_sewa'] ?> Hari</td>
</tr>

<tr>
<td>Total Bayar</td>
<td>Rp <?= number_format($d['total_bayar']) ?></td>
</tr>

<tr>
<td>Status</td>
<td><?= $d['status'] ?></td>
</tr>

</table>

</body>
</html>