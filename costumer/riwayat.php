<?php
// Set session cookie lifetime to 0, setelah browser ditutup, session akan hilang 
ini_set('session.cookie_lifetime', 0);
session_start();

// Cek apakah session customer_id sudah ada atau belum
if (!isset($_SESSION['customer_id'])) {
    // Jika belum login, paksa lempar kembali ke halaman login
    header("location:login.php?pesan=belum login");
    exit(); 
}
?>

<h1>Riwayat Sewa</h1>
   