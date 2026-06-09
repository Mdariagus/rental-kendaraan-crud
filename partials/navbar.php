<?php
$current = basename($_SERVER['PHP_SELF']);
?>

<nav class="w-full flex justify-center mt-6 px-4">

    <div class="w-full max-w-7xl bg-slate-900 rounded-full px-8 py-6">

        <div class="flex items-center justify-between">

            <!-- Logo -->
            <a href="index.php"
               class="text-4xl font-black uppercase tracking-tight">
                NAMA RENTAL
            </a>

            <!-- Menu -->
            <ul class="hidden lg:flex items-center gap-10 text-lg font-semibold">

                <li>
                    <a href="index.php"
                       class="<?= $current == 'index.php'
                       ? 'bg-blue-500 px-6 py-2 rounded-full'
                       : '' ?>">
                        Home
                    </a>
                </li>

                <li>
                    <a href="tentang.php"
                       class="<?= $current == 'tentang.php'
                       ? 'bg-blue-500 px-6 py-2 rounded-full'
                       : '' ?>">
                        About
                    </a>
                </li>

                <li>
                    <a href="kendaraan.php"
                       class="<?= $current == 'kendaraan.php'
                       ? 'bg-blue-500 px-6 py-2 rounded-full'
                       : '' ?>">
                        Kendaraan
                    </a>
                </li>

                <li>
                    <a href="sewa.php"
                       class="<?= $current == 'sewa.php'
                       ? 'bg-blue-500 px-6 py-2 rounded-full'
                       : '' ?>">
                        Sewa
                    </a>
                </li>

            </ul>

            <!-- Register -->
            <a href="register.php"
               class="<?= $current == 'register.php'
               ? 'bg-blue-500'
               : 'hover:bg-blue-500'
               ?> px-5 py-3 rounded-full font-bold transition">

                DAFTAR >
            </a>

        </div>

    </div>

</nav>