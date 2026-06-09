<?php

include "../../koneksi.php";

$id = $_GET['id'];

$data = mysqli_query(
    $koneksi,
    "SELECT * FROM customer
    WHERE id_customer='$id'"
);

$d = mysqli_fetch_array($data);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Detail Customer</title>
</head>
<body>

<h2>Detail Customer</h2>

<a href="index.php">Kembali</a>

<br><br>

<table border="1" cellpadding="10">

<tr>
    <td>ID Customer</td>
    <td><?= $d['id_customer'] ?></td>
</tr>

<tr>
    <td>Nama</td>
    <td><?= $d['nama'] ?></td>
</tr>

<tr>
    <td>Alamat</td>
    <td><?= $d['alamat'] ?></td>
</tr>

<tr>
    <td>No HP</td>
    <td><?= $d['no_hp'] ?></td>
</tr>

</table>

</body>
</html>