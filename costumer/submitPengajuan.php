<?php
// Mengatur agar session cookie langsung kadaluarsa saat browser ditutup
ini_set('session.cookie_lifetime', 0);
session_start();

// Menghubungkan koneksi database
include '../config/koneksi.php';

// Proteksi halaman: pastikan user sudah login
if (!isset($_SESSION['customer_id'])) {
    header("location:login.php?pesan=belum login");
    exit(); 
}

    $id_customer  = $_SESSION['customer_id'];
    $id_kendaraan = $_POST['id_kendaraan'];
    $jaminan      = $_POST['jaminan'];
    $tgl_sewa     = $_POST['tgl_sewa'];
    $tgl_kembali  = $_POST['tgl_kembali'];
    $harga_sewa  = $_POST['harga_sewa'];

    // 1. Ambil tanggal hari ini untuk validasi tanggal mundur
    $today = date('Y-m-d');

    // 2. Hitung durasi hari sewa (Lama Sewa)
    $selisih = strtotime($tgl_kembali) - strtotime($tgl_sewa);
    $lama_sewa = round($selisih / (60 * 60 * 24));

    // --- VALIDASI TANGGAL ---
    if ($tgl_sewa < $today) {
        $_SESSION['pesan_error'] = "Tanggal sewa tidak boleh mundur sebelum hari ini!";
        header("location: form_pengajuan.php"); 
        exit();
    } elseif ($lama_sewa < 1) {
        $_SESSION['pesan_error'] = "Tanggal kembali minimal harus 1 hari setelah tanggal sewa!";
        header("location: form_pengajuan.php");
        exit();
    } else {
        // 3. Ambil data harga sewa mobil dari database
        $query_mobil = mysqli_query($koneksi, "SELECT harga_sewa, status FROM kendaraan WHERE id_kendaraan = '$id_kendaraan'");
        
        if (mysqli_num_rows($query_mobil) > 0) {
            $data_mobil = mysqli_fetch_assoc($query_mobil);
            $harga_sewa = $data_mobil['harga_sewa'];
            $status_mobil = $data_mobil['status'];

            // Cek apakah mobil sedang disewa oleh orang lain
            if ($status_mobil == 'Disewa') {
                $_SESSION['pesan_error'] = "Maaf, mobil ini sedang disewa oleh pelanggan lain!";
                header("location: form_pengajuan.php");
                exit();
            } else {
                // 4. Hitung total biaya yang harus dibayar
                $total_bayar = $lama_sewa * $harga_sewa;

                // 5. Simpan transaksi baru dengan status default 'Menunggu'
                // Menggunakan kolom 'jaminan_identitas' agar sesuai dengan skema database
                $query_insert = "INSERT INTO transaksi (id_customer, id_kendaraan, tanggal_sewa, tanggal_kembali, lama_sewa, total_bayar, jaminan, status) 
                                VALUES ('$id_customer', '$id_kendaraan', '$tgl_sewa', '$tgl_kembali', '$lama_sewa', '$total_bayar', '$jaminan', 'Menunggu')";
                
                if (mysqli_query($koneksi, $query_insert)) {
                    // Update status kendaraan menjadi 'Disewa' agar tidak bisa disewa ganda
                    mysqli_query($koneksi, "UPDATE kendaraan SET status = 'Disewa' WHERE id_kendaraan = '$id_kendaraan'");

                    $_SESSION['pesan_sukses'] = "Booking Anda berhasil disimpan! Total Pembayaran Pokok: Rp " . number_format($total_bayar, 0, ',', '.');
                    header("location: riwayat.php"); // Mengarahkan pengguna langsung ke halaman riwayat pengajuan sewa Anda
                    exit();
                } else {
                    $_SESSION['pesan_error'] = "Gagal mendaftarkan pengajuan: " . mysqli_error($koneksi);
                    header("location: form_pengajuan.php");
                    exit();
                }
            }
        } else {
            $_SESSION['pesan_error'] = "Spesifikasi data mobil tidak ditemukan di database!";
            header("location: form_pengajuan.php");
            exit();
        }
    }

?>