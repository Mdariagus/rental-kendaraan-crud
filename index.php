<?php
$pageTitle = "Beranda";
include "partials/header.php";
include "partials/navbar.php";
?>

<!-- HERO SECTION -->
<section class="min-h-[85vh] flex items-center">

    <div class="max-w-7xl mx-auto px-6 w-full">

        <div class="grid lg:grid-cols-2 gap-12 items-center">

            <!-- KIRI -->
            <div>

                <span class="inline-block px-4 py-2 rounded-full bg-blue-500/20 text-blue-400 text-sm font-semibold mb-6">
                    🚗 Rental Kendaraan Terpercaya
                </span>

                <h1 class="text-5xl lg:text-7xl font-black leading-tight mb-6">
                    Sewa Kendaraan
                    <span class="text-blue-500">
                        Mudah,
                    </span>
                    Cepat &
                    Aman
                </h1>

                <p class="text-slate-400 text-lg leading-relaxed mb-8">
                    Temukan kendaraan terbaik untuk perjalanan Anda.
                    Tersedia berbagai pilihan mobil dan motor dengan
                    harga terjangkau serta pelayanan profesional.
                </p>

                <div class="flex flex-wrap gap-4">

                    <a href="kendaraan.php"
                       class="px-8 py-4 bg-blue-500 hover:bg-blue-600 rounded-full font-semibold transition">
                        Lihat Kendaraan
                    </a>

                    <a href="register.php"
                       class="px-8 py-4 border border-slate-700 hover:border-blue-500 rounded-full font-semibold transition">
                        Daftar Sekarang
                    </a>

                </div>

                <!-- Statistik -->
                <div class="flex gap-10 mt-12">

                    <div>
                        <h3 class="text-3xl font-bold">500+</h3>
                        <p class="text-slate-400">Pelanggan</p>
                    </div>

                    <div>
                        <h3 class="text-3xl font-bold">50+</h3>
                        <p class="text-slate-400">Armada</p>
                    </div>

                    <div>
                        <h3 class="text-3xl font-bold">24/7</h3>
                        <p class="text-slate-400">Support</p>
                    </div>

                </div>

            </div>

            <!-- KANAN -->
            <div class="relative">

                <div class="absolute inset-0 bg-blue-500 blur-[120px] opacity-20"></div>

                <img
                    src="assets/images/car-hero.png"
                    alt="Mobil Rental"
                    class="relative z-10 w-full drop-shadow-2xl">

            </div>

        </div>

    </div>

</section>

<!-- KEUNGGULAN -->
<section class="py-24">

    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center mb-16">

            <h2 class="text-4xl font-bold mb-4">
                Kenapa Memilih Kami?
            </h2>

            <p class="text-slate-400">
                Pelayanan terbaik untuk kebutuhan perjalanan Anda.
            </p>

        </div>

        <div class="grid md:grid-cols-3 gap-8">

            <div class="bg-slate-900 p-8 rounded-3xl">
                <div class="text-5xl mb-4">💰</div>
                <h3 class="text-xl font-bold mb-3">
                    Harga Terjangkau
                </h3>
                <p class="text-slate-400">
                    Tarif kompetitif tanpa biaya tersembunyi.
                </p>
            </div>

            <div class="bg-slate-900 p-8 rounded-3xl">
                <div class="text-5xl mb-4">🛡️</div>
                <h3 class="text-xl font-bold mb-3">
                    Aman & Terpercaya
                </h3>
                <p class="text-slate-400">
                    Kendaraan terawat dan siap digunakan.
                </p>
            </div>

            <div class="bg-slate-900 p-8 rounded-3xl">
                <div class="text-5xl mb-4">⚡</div>
                <h3 class="text-xl font-bold mb-3">
                    Proses Cepat
                </h3>
                <p class="text-slate-400">
                    Pemesanan kendaraan hanya dalam beberapa menit.
                </p>
            </div>

        </div>

    </div>

</section>

<?php include 'partials/footer.php'; ?>