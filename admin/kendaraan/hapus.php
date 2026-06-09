<?php

include "../../koneksi.php";

$id = $_GET['id'];

mysqli_query(
$koneksi,
"DELETE FROM kendaraan
WHERE id_kendaraan='$id'"
);

header("Location:index.php");