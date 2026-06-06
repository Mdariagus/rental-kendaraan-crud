<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login admin</title>
</head>
<body>
  <h2>LOGIN ADMIN</h2>
  <?php 
    if(isset($_GET['pesan'])) {
      if ($_GET['pesan'] == 'gagal') {
        echo "Login gagal ! Username & Password salah !";
      } else if ($_GET['pesan'] == 'login') {
        echo "anda telah berhasil login";
        header("location:"); ///location tinggal diisi nama file amdin
        exit();
      } else if ($_GET['pesan'] == 'belum login') {
        echo "Anda harus login untuk mengakses halaman admin";
      }
    }
  ?>

  <br>
  <br>

  <form action="cek_login.php" method="POST">
    <table>
      <tr>
        <td>Username</td>
        <td> : </td>
        <td><input type="text" name="username" placeholder="Masukkan username"></td>
      </tr>
      <tr>
        <td>Password</td>
        <td> : </td>
        <td><input type="password" name="password" placeholder="Masukkan password"></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td><input type="submit" value="Login"></td>
      </tr>
    </table>
  </form>
</body>
</html>