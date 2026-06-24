<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/Login.css" />
  <title>ADMIN LOGIN PAGE</title>
</head>
<body>
    <main class="register-container">

    <!-- LEFT SIDE -->
    <div class="left-side">

        <img src="../assets/img/bgmain.png" alt="Background" class="bg-image">

        <div class="overlay">
            <h2>ADMIN PANEL!</h2>

            <p>
            Kelola data kendaraan, pelanggan, transaksi,
            dan aktivitas penyewaan melalui dashboard
            administrator.
            </p>
        </div>

    </div>

    <!-- RIGHT SIDE -->
    <div class="right-side">

        <div class="form-container">

            <h2>LOGIN ACCOUNT</h2>

            <form action="cek_login.php" method="POST">
                <div class="input-group">
                    <input type="text" name="username" placeholder="Masukkan username">
                </div>
                <div class="input-group">
                    <input type="password" name="password" placeholder="Masukkan Password">
                </div>
                <button type="submit" class="btn-register">
                    LOGIN
                </button>
            </form>

            <p class="login-link">
                Belum memiliki akun?
                <a href="register.php">Daftar</a>
            </p>
        </div>
    </div>
</main>
</body>
</html>