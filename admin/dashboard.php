<?php
include 'partials/header.php';
include '../config/koneksi.php';

/* ===============================
   QUERY STATISTIK
================================*/

// Jumlah Customer
$qCustomer = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM customer");
$totalCustomer = mysqli_fetch_assoc($qCustomer)['total'] ?? 0;

// Jumlah Kendaraan
$qKendaraan = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM kendaraan");
$totalKendaraan = mysqli_fetch_assoc($qKendaraan)['total'] ?? 0;

// Jumlah Pengajuan
$qPengajuan = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM transaksi");
$totalPengajuan = mysqli_fetch_assoc($qPengajuan)['total'] ?? 0;

// Total Pendapatan
$qPendapatan = mysqli_query($koneksi,"
SELECT SUM(total_bayar) as total
FROM transaksi
WHERE status='Selesai'
");

$totalPendapatan = mysqli_fetch_assoc($qPendapatan)['total'] ?? 0;
?>

<?php include 'partials/sidebar.php'; ?>

<div class="flex-1 flex flex-col">

<?php include 'partials/navbar.php'; ?>

<div class="p-8 bg-slate-100 min-h-screen">

    <!-- Judul -->

    <div class="mb-8">

        <h1 class="text-3xl font-bold text-slate-800">

            Dashboard

        </h1>

        <p class="text-slate-500">

            Ringkasan aktivitas Rental Kendaraan

        </p>

    </div>





    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mb-8">

    <!-- Customer -->

    <div class="bg-white rounded-2xl shadow p-6">

        <div class="flex justify-between">

            <div>

                <p class="text-slate-500">

                    Customer

                </p>

                <h2 class="text-4xl font-bold mt-2">

                    <?= $totalCustomer ?>

                </h2>

            </div>

            <div class="bg-blue-100 w-16 h-16 rounded-xl flex items-center justify-center">

                <i data-feather="users" class="text-blue-600"></i>

            </div>

        </div>

    </div>

    <!-- Kendaraan -->

    <div class="bg-white rounded-2xl shadow p-6">

        <div class="flex justify-between">

            <div>

                <p class="text-slate-500">

                    Kendaraan

                </p>

                <h2 class="text-4xl font-bold mt-2">

                    <?= $totalKendaraan ?>

                </h2>

            </div>

            <div class="bg-green-100 w-16 h-16 rounded-xl flex items-center justify-center">

                <i data-feather="truck" class="text-green-600"></i>

            </div>

        </div>

    </div>

    <!-- Pengajuan -->

    <div class="bg-white rounded-2xl shadow p-6">

        <div class="flex justify-between">

            <div>

                <p class="text-slate-500">

                    Pengajuan

                </p>

                <h2 class="text-4xl font-bold mt-2">

                    <?= $totalPengajuan ?>

                </h2>

            </div>

            <div class="bg-yellow-100 w-16 h-16 rounded-xl flex items-center justify-center">

                <i data-feather="clipboard" class="text-yellow-600"></i>

            </div>

        </div>

    </div>

    <!-- Pendapatan -->

    <div class="bg-white rounded-2xl shadow p-6">

        <div class="flex justify-between">

            <div>

                <p class="text-slate-500">

                    Pendapatan

                </p>

                <h2 class="text-2xl font-bold mt-2">

                    Rp <?= number_format($totalPendapatan,0,',','.') ?>

                </h2>

            </div>

            <div class="bg-red-100 w-16 h-16 rounded-xl flex items-center justify-center">

                <i data-feather="dollar-sign" class="text-red-600"></i>

            </div>

        </div>

    </div>

</div>







<div class="bg-white rounded-2xl shadow p-6 mb-8">

    <h2 class="font-bold text-xl mb-6">

        Statistik Penyewaan

    </h2>

    <canvas id="chartRental" height="90"></canvas>

</div>






<?php

$data = mysqli_query($koneksi,"
SELECT
    t.*,
    c.nama AS customer_nama,
    k.nama_kendaraan
FROM transaksi t
JOIN customer c ON t.id_customer = c.id_customer
JOIN kendaraan k ON t.id_kendaraan = k.id_kendaraan
ORDER BY t.total_bayar DESC
LIMIT 5
");

?>

<div class="bg-white rounded-2xl shadow">

<div class="p-6 border-b">

<h2 class="font-bold text-xl">

Pengajuan Terbaru

</h2>

</div>

<table class="w-full">

<thead class="bg-slate-100">

<tr>

<th class="p-4 text-left">Customer</th>

<th class="p-4">Kendaraan</th>

<th class="p-4">Tanggal</th>

<th class="p-4">Status</th>

</tr>

</thead>

<tbody>

<?php while($d=mysqli_fetch_assoc($data)): ?>

<tr class="border-b hover:bg-slate-50">

<td class="p-4">

<?= $d['customer_nama']; ?>

</td>

<td class="text-center">

<?= $d['nama_kendaraan']; ?>

</td>

<td class="text-center">

<?= $d['lama_sewa']; ?> hari

</td>

<td class="text-center">

<?php

$status = $d['status'];

$warna='bg-yellow-500';

if($status=='Disetujui') $warna='bg-green-500';

if($status=='Ditolak') $warna='bg-red-500';

?>

<span class="<?= $warna ?> text-white px-3 py-1 rounded-full text-sm">

<?= $status ?>

</span>

</td>

</tr>

<?php endwhile; ?>

</tbody>

</table>

</div>




<script>

const ctx = document.getElementById('chartRental');

new Chart(ctx,{

type:'line',

data:{

labels:['Jan','Feb','Mar','Apr','Mei','Jun'],

datasets:[{

label:'Penyewaan',

data:[10,15,8,20,25,18],

borderWidth:3,

fill:false,

tension:0.4

}]

},

options:{

responsive:true,

plugins:{

legend:{

display:false

}

}

}

});

</script>


</div>
</div>

<?php include 'partials/footer.php'; ?>