<?php
// Memulai sesi PHP di bagian paling atas
session_start();

include '../config/koneksi.php';


    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validasi sederhana: pastikan input tidak kosong
    if (empty($username) || empty($password)) {
        header("location:index.php?pesan=kosong");
        exit();
    } else {
        // Mencari data customer berdasarkan email dan password yang dimasukkan
        $query = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
        $eksekusi = mysqli_query($koneksi, $query);
        
        // Memeriksa apakah data customer ditemukan
        if (mysqli_num_rows($eksekusi) > 0) {
            $data_customer = mysqli_fetch_assoc($eksekusi);


            $_SESSION['admin_nama'] = $data_customer['nama'];
            $_SESSION['admin_username'] = $data_customer['username'];

            // Alihkan halaman ke beranda utama setelah sukses masuk log
            header("location:dashboard.php");
            exit();
        } else {
            // Jika data tidak cocok, kembalikan ke login dengan pesan gagal
            header("location:index.php?pesan=gagal");
            exit();
        }
    }
    
?>