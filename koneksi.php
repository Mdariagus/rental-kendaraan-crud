<?php

$koneksi = mysqli_connect(
    "localhost",
    "root",
    "",
    "db_rental"
);

if (!$koneksi) {
    die("Koneksi Gagal: " . mysqli_connect_error());
}

?>