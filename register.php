<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "koneksi.php";

if(isset($_POST['register'])){

    $nama     = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $alamat   = mysqli_real_escape_string($koneksi, $_POST['alamat']);
    $no_hp    = mysqli_real_escape_string($koneksi, $_POST['no_hp']);
    $email    = mysqli_real_escape_string($koneksi, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $cek = mysqli_query(
        $koneksi,
        "SELECT * FROM customer WHERE email='$email'"
    );

    if(mysqli_num_rows($cek) > 0){

        $error = "Email sudah digunakan";

    } else {

        $result = mysqli_query($koneksi, "
            INSERT INTO customer
            (nama, alamat, no_hp, email, password)
            VALUES
            ('$nama', '$alamat', '$no_hp', '$email', '$password')
        ");

        if($result){
            header("Location: login.php?register=sukses");
            exit;
        } else {
            $error = "Registrasi gagal: " . mysqli_error($koneksi);
        }
    }
}

$pageTitle = "Daftar Akun";
include "partials/header.php";
include "partials/navbar.php";
?>

<section class="max-w-2xl mx-auto py-20 px-6">

    <div class="bg-slate-900 rounded-3xl p-8 shadow-lg">

        <h1 class="text-3xl font-bold text-center mb-8">
            Daftar Akun Customer
        </h1>

        <?php if(isset($error)): ?>
            <div class="bg-red-500/20 text-red-400 p-4 rounded-xl mb-6">
                <?= $error ?>
            </div>
        <?php endif; ?>

        <form method="POST" class="space-y-5">

            <div>
                <label class="block mb-2">Nama Lengkap</label>
                <input
                    type="text"
                    name="nama"
                    required
                    class="w-full bg-slate-800 border border-slate-700 rounded-xl p-4">
            </div>

            <div>
                <label class="block mb-2">Alamat</label>
                <textarea
                    name="alamat"
                    required
                    class="w-full bg-slate-800 border border-slate-700 rounded-xl p-4"></textarea>
            </div>

            <div>
                <label class="block mb-2">Nomor HP</label>
                <input
                    type="text"
                    name="no_hp"
                    required
                    class="w-full bg-slate-800 border border-slate-700 rounded-xl p-4">
            </div>

            <div>
                <label class="block mb-2">Email</label>
                <input
                    type="email"
                    name="email"
                    required
                    class="w-full bg-slate-800 border border-slate-700 rounded-xl p-4">
            </div>

            <div>
                <label class="block mb-2">Password</label>
                <input
                    type="password"
                    name="password"
                    required
                    class="w-full bg-slate-800 border border-slate-700 rounded-xl p-4">
            </div>

            <button
                type="submit"
                name="register"
                class="w-full bg-blue-500 hover:bg-blue-600 py-4 rounded-xl font-semibold transition">

                Daftar

            </button>

        </form>

        <p class="text-center mt-6 text-slate-400">
            Sudah punya akun?

            <a href="login.php" class="text-blue-400 hover:text-blue-300">
                Login sekarang
            </a>
        </p>

    </div>

</section>

<?php include "partials/footer.php"; ?>