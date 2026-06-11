<?php 
  include '../config/koneksi.php';

    $email = $_POST['email'];
    $nama = $_POST['nama'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];
    $password = $_POST['password'];

    // Validasi sederhana di sisi server: Pastikan tidak ada data yang kosong
    if (empty($email) || empty($nama) || empty($no_hp) || empty($alamat) || empty($password)) {
        $pesan_error = "Harap lengkapi semua bidang formulir!";
    } else {
        // Cek apakah email sudah terdaftar sebelumnya di database
        $cek_email = mysqli_query($koneksi, "SELECT * FROM customer WHERE email = '$email'");
        if (mysqli_num_rows($cek_email) > 0) {
            $pesan_error = "Email sudah terdaftar! Gunakan alamat email yang lain.";
        } else {
            // Melakukan query INSERT untuk mendaftarkan customer baru
            $query_register = "INSERT INTO customer (nama, email, no_hp, alamat, password) 
                               VALUES ('$nama', '$email', '$no_hp', '$alamat', '$password')";
            
            if (mysqli_query($koneksi, $query_register)) {
                $pesan_sukses = "Akun berhasil dibuat! Silakan masuk ke halaman login.";
                header("location: login.php");
            } else {
                $pesan_error = "Registrasi gagal karena kesalahan sistem: " . mysqli_error($koneksi);
            }
        }
    }
?>