<?php 
  include 'config/koneksi.php';

  $nama = $_POST['nama'];
  $alamat = $_POST['alamat'];
  $no_hp = $_POST['no_hp'];

  $id_kendaraan = $_POST['id_kendaraan'];
  $tanggal_sewa = $_POST['tanggal_sewa'];
  $tanggal_kembali = $_POST['tanggal_kembali'];

mysqli_query($koneksi, "
INSERT INTO customer (nama, alamat, no_hp)
VALUES ('$nama', '$alamat', '$no_hp')
");

$id_customer = mysqli_insert_id($koneksi);

if ($id_customer == 0) {
    die("ID customer tidak terbaca");
}

$querykendaraan = mysqli_query($koneksi, "SELECT harga_sewa FROM kendaraan WHERE id_kendaraan = '$id_kendaraan'");
  // ambil harga kendaraan
  $datakendaraan = mysqli_fetch_assoc($querykendaraan);

  $harga_sewa = $datakendaraan['harga_sewa'];

  // hitung lama sewa 
  $lama_sewa = (strtotime($tanggal_kembali) - strtotime($tanggal_sewa)) / 86400;

  // hitung total bayar
  $total_bayar = $lama_sewa * $harga_sewa;

  mysqli_query($koneksi, "INSERT INTO transaksi (id_transaksi, id_customer, id_kendaraan, tanggal_sewa, tanggal_kembali, lama_sewa, total_bayar)
  VALUES ('', '$id_customer', '$id_kendaraan', '$tanggal_sewa', '$tanggal_kembali', '$lama_sewa', '$total_bayar')");

  header("location:index.php");
?>