<?php
include "koneksi.php";
include "partials/header.php";
include "partials/navbar.php";

$id = $_GET['id'];

$data = mysqli_query(
    $koneksi,
    "SELECT * FROM kendaraan
    WHERE id_kendaraan='$id'"
);

$k = mysqli_fetch_assoc($data);

if(!$k){
    echo "<h1>Kendaraan tidak ditemukan</h1>";
    exit;
}
?>

<section class="py-20">

    <div class="max-w-7xl mx-auto px-6">

        <div class="grid lg:grid-cols-2 gap-12 items-center">

            <!-- FOTO -->
            <div>

                <?php if(!empty($k['foto'])): ?>

                    <img
                        src="uploads/<?= $k['foto'] ?>"
                        class="w-full rounded-3xl shadow-2xl">

                <?php else: ?>

                    <img
                        src="assets/images/default-car.jpg"
                        class="w-full rounded-3xl shadow-2xl">

                <?php endif; ?>

            </div>

            <!-- DETAIL -->
            <div>

                <span class="inline-block mb-4 px-4 py-2 rounded-full bg-blue-500/20 text-blue-400">
                    <?= $k['status'] ?>
                </span>

                <h1 class="text-5xl font-bold mb-6">
                    <?= htmlspecialchars($k['nama_kendaraan']) ?>
                </h1>

                <div class="space-y-4 mb-8">

                    <div class="flex justify-between border-b border-slate-800 pb-3">
                        <span class="text-slate-400">Merk</span>
                        <span><?= htmlspecialchars($k['merk']) ?></span>
                    </div>

                    <div class="flex justify-between border-b border-slate-800 pb-3">
                        <span class="text-slate-400">Tahun</span>
                        <span><?= $k['tahun'] ?></span>
                    </div>

                    <div class="flex justify-between border-b border-slate-800 pb-3">
                        <span class="text-slate-400">Plat Nomor</span>
                        <span><?= $k['plat_nomor'] ?></span>
                    </div>

                    <div class="flex justify-between border-b border-slate-800 pb-3">
                        <span class="text-slate-400">Harga Sewa</span>
                        <span class="text-blue-400 font-bold">
                            Rp <?= number_format($k['harga_sewa'],0,',','.') ?>/hari
                        </span>
                    </div>

                </div>

                <div class="mb-10">

                    <h3 class="text-2xl font-bold mb-4">
                        Deskripsi
                    </h3>

                    <p class="text-slate-400 leading-relaxed">
                        <?= !empty($k['deskripsi'])
                            ? nl2br(htmlspecialchars($k['deskripsi']))
                            : 'Belum ada deskripsi kendaraan.' ?>
                    </p>

                </div>

                <?php if($k['status'] == 'Tersedia'): ?>

                    <a href="login.php"
                       class="inline-block bg-blue-500 hover:bg-blue-600 px-8 py-4 rounded-full font-semibold">
                        🚗 Sewa Sekarang
                    </a>

                <?php else: ?>

                    <button
                        disabled
                        class="bg-red-500 px-8 py-4 rounded-full cursor-not-allowed">
                        Sedang Disewa
                    </button>

                <?php endif; ?>

            </div>

        </div>

    </div>

</section>

<?php include "partials/footer.php"; ?>