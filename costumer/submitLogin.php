<?php
// Memulai sesi PHP di bagian paling atas
session_start();

include '../config/koneksi.php';

    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Validasi sederhana: pastikan input tidak kosong
    if (empty($email) || empty($password)) {
        header("location:login.php?pesan=kosong");
        exit();
    } else {
        // Mencari data customer berdasarkan email dan password yang dimasukkan
        $query = "SELECT * FROM customer WHERE email = '$email' AND password = '$password'";
        $eksekusi = mysqli_query($koneksi, $query);
        
        // Memeriksa apakah data customer ditemukan
        if (mysqli_num_rows($eksekusi) > 0) {
            $data_customer = mysqli_fetch_assoc($eksekusi);

            // Menyimpan data penting customer ke dalam Session
            $_SESSION['customer_id'] = $data_customer['id_customer'];
            $_SESSION['customer_nama'] = $data_customer['nama'];
            $_SESSION['customer_email'] = $data_customer['email'];

            // Alihkan halaman ke beranda utama setelah sukses masuk log
            header("location:index.php");
            exit();
        } else {
            // Jika data tidak cocok, kembalikan ke login dengan pesan gagal
            header("location:login.php?pesan=gagal");
            exit();
        }
    }
    
?>