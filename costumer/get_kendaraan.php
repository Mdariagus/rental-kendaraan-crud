<?php

include '../config/koneksi.php';

if(isset($_POST['merk']))
{
    $merk = $_POST['merk'];

    $query = mysqli_query($koneksi,
    "SELECT * FROM kendaraan WHERE merk='$merk' AND status='Tersedia'");

    echo '<option value="">
            Pilih ID Mobil
          </option>';

    while($data = mysqli_fetch_assoc($query))
    {
        echo '<option value="'.$data['id_kendaraan'].'">
                '.$data['id_kendaraan'].'
              </option>';
    }
}
?>