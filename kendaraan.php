<?php
include "koneksi.php";

$pageTitle = "Daftar Kendaraan";
include "partials/header.php";
include "partials/navbar.php";

$data = mysqli_query($koneksi, "
    SELECT * FROM kendaraan
    ORDER BY id_kendaraan DESC
");
?>

<section class="py-20">

    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center mb-14">

            <h1 class="text-5xl font-bold mb-4">
                Armada Kendaraan
            </h1>

            <p class="text-slate-400">
                Pilih kendaraan terbaik sesuai kebutuhan perjalanan Anda.
            </p>

        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

            <?php while($k = mysqli_fetch_assoc($data)): ?>

            <div class="bg-slate-900 rounded-3xl overflow-hidden hover:-translate-y-2 transition duration-300">

                <img
                    src="assets/images/<?= $k['foto'] ?? 'default-car.jpg'; ?>"
                    alt="<?= htmlspecialchars($k['nama_kendaraan']) ?>"
                    class="w-full h-56 object-cover">

                <div class="p-6">

                    <h3 class="text-2xl font-bold mb-3">
                        <?= htmlspecialchars($k['nama_kendaraan']) ?>
                    </h3>

                    <p class="text-blue-400 text-xl font-semibold mb-4">
                        Rp <?= number_format($k['harga_sewa'],0,',','.') ?>/hari
                    </p>

                    <div class="flex justify-between items-center">

                        <?php
                        $status = $k['status'] ?? 'Tersedia';
                        ?>

                        <span class="px-3 py-1 rounded-full text-sm bg-green-500/20 text-green-400">
                            <?= $status ?>
                        </span>

                        <a href="detail-kendaraan.php?id=<?= $k['id_kendaraan'] ?>"
                           class="bg-blue-500 hover:bg-blue-600 px-5 py-2 rounded-full">
                            Detail
                        </a>

                    </div>

                </div>

            </div>

            <?php endwhile; ?>

        </div>

    </div>

</section>

<?php include "partials/footer.php"; ?>