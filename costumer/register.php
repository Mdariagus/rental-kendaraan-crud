<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="../assets/css/Login.css" />
  <title>REGISTER PAGE</title>
</head>
<body>
    <main class="register-container">

    <!-- LEFT SIDE -->
    <div class="left-side">

        <img src="../assets/img/bgmain.png" alt="Background" class="bg-image">

        <div class="overlay">
            <h2>WELCOME!</h2>

            <p>
                Daftarkan akun Anda dan nikmati kemudahan menyewa
                kendaraan kapan saja dengan proses yang cepat,
                aman, dan terpercaya.
            </p>
        </div>

    </div>

    <!-- RIGHT SIDE -->
    <div class="right-side">

        <div class="form-container">

            <h2>REGISTER ACCOUNT</h2>

            <p>
                Lengkapi data berikut untuk membuat akun customer.
            </p>

            <?php if (!empty($pesan_error)): ?>
                <div class="alert-msg alert-error">
                    <?= $pesan_error; ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($pesan_sukses)): ?>
                <div class="alert-msg alert-success">
                    <?= $pesan_sukses; ?>
                </div>
            <?php endif; ?>

            <form action="submitRegister.php" method="POST">
                <div class="input-group">
                    <input type="email" name="email" placeholder="Masukkan Email">
                </div>
                <div class="input-group">
                    <input type="text" name="nama" placeholder="Masukkan Nama Lengkap">
                </div>
                <div class="input-group">
                    <input type="text" name="no_hp" placeholder="Masukkan Nomor HP">
                </div>
                <div class="input-group">
                    <input type="text" name="alamat" placeholder="Masukkan Alamat">
                </div>
                <div class="input-group">
                    <input type="password" name="password" placeholder="Masukkan Password">
                </div>
                <button type="submit" class="btn-register">
                    CREATE ACCOUNT
                </button>
            </form>

            <p class="login-link">
                Sudah memiliki akun?
                <a href="login.php">Login</a>
            </p>
        </div>
    </div>
</main>
</body>
</html>