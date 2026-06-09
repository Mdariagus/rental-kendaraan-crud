<?php
session_start();
include "koneksi.php";

if(isset($_POST['login'])){

    $email    = mysqli_real_escape_string($koneksi, $_POST['email']);
    $password = $_POST['password'];

    $query = mysqli_query(
        $koneksi,
        "SELECT * FROM customer WHERE email='$email'"
    );

    if(mysqli_num_rows($query) == 1){

        $customer = mysqli_fetch_assoc($query);

        if(password_verify($password, $customer['password'])){

            $_SESSION['id_customer'] = $customer['id_customer'];
            $_SESSION['nama_customer'] = $customer['nama'];
            $_SESSION['email_customer'] = $customer['email'];

            header("Location: customer/dashboard.php");
            exit;

        } else {
            $error = "Password salah!";
        }

    } else {
        $error = "Email tidak ditemukan!";
    }
}

$pageTitle = "Login";
include "partials/header.php";
include "partials/navbar.php";
?>

<section class="max-w-md mx-auto py-20 px-6">

    <div class="bg-slate-900 rounded-3xl p-8 shadow-lg">

        <h1 class="text-3xl font-bold text-center mb-8">
            Login Customer
        </h1>

        <?php if(isset($_GET['register']) && $_GET['register'] == 'sukses'): ?>
            <div class="bg-green-500/20 text-green-400 p-4 rounded-xl mb-6">
                Registrasi berhasil. Silakan login.
            </div>
        <?php endif; ?>

        <?php if(isset($error)): ?>
            <div class="bg-red-500/20 text-red-400 p-4 rounded-xl mb-6">
                <?= $error ?>
            </div>
        <?php endif; ?>

        <form method="POST" class="space-y-5">

            <div>
                <label class="block mb-2">Email</label>
                <input
                    type="email"
                    name="email"
                    required
                    class="w-full bg-slate-800 border border-slate-700 rounded-xl p-4 focus:outline-none focus:border-blue-500">
            </div>

            <div>
                <label class="block mb-2">Password</label>
                <input
                    type="password"
                    name="password"
                    required
                    class="w-full bg-slate-800 border border-slate-700 rounded-xl p-4 focus:outline-none focus:border-blue-500">
            </div>

            <button
                type="submit"
                name="login"
                class="w-full bg-blue-500 hover:bg-blue-600 py-4 rounded-xl font-semibold transition">

                Login

            </button>

        </form>

        <p class="text-center mt-6 text-slate-400">
            Belum punya akun?

            <a href="register.php" class="text-blue-400 hover:text-blue-300">
                Daftar sekarang
            </a>
        </p>

    </div>

</section>

<?php include "partials/footer.php"; ?>