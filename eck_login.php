<?php 
  session_start();

  inlcude 'koneksi.php';

  $username = $_POST['username'];
  $password = $_POSt['password'];

  $data = mysqli_query($koneksi, "SELECT * FROM admin WHERE username = '$username' AND password='$password'");

  $cek = mysqli_num_rows($data);

  if ($cek > 0) {
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
  } else {
    header("location:login.php?pesan=gagal");
  }
?>