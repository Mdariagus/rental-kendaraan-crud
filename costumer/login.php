<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/Login.css" />
  <title>LOGIN PAGE</title>
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

            <h2>LOGIN ACCOUNT</h2>

            <p>
                Masukkan data akun Anda untuk masuk.
            </p>

            <form action="submitLogin.php" method="POST">
                <div class="input-group">
                    <input type="email" name="email" placeholder="Masukkan Email">
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