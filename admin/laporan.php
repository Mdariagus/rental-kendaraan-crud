<?php
include "../koneksi.php";
include "partials/sidebar.php";

$data = mysqli_query($koneksi, "
    SELECT t.*, c.nama, k.nama_kendaraan, k.harga_sewa,
    DATEDIFF(t.tanggal_kembali, t.tanggal_sewa) as durasi
    FROM transaksi t
    JOIN customer c ON t.id_customer = c.id_customer
    JOIN kendaraan k ON t.id_kendaraan = k.id_kendaraan
    ORDER BY t.id_transaksi DESC
");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Transaksi</title>
</head>
<body>

<div class="main-content">
    <a href="dashboard.php" class="btn-back">← Kembali</a>
    <div class="page-title">Laporan Transaksi</div>

    <div class="table-card">
        <div class="table-header">
            <h2>Semua Transaksi</h2>
            <button onclick="window.print()" class="btn-add">🖨 Print</button>
        </div>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Transaksi</th>
                    <th>Customer</th>
                    <th>Kendaraan</th>
                    <th>Tgl Sewa</th>
                    <th>Tgl Kembali</th>
                    <th>Durasi</th>
                    <th>Total</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
            <?php $no = 1; while($d = mysqli_fetch_assoc($data)):
                $badge = match($d['status']) {
                    'Menunggu'  => 'badge-orange',
                    'Disetujui' => 'badge-blue',
                    'Selesai'   => 'badge-green',
                    default     => 'badge-gray'
                };
                $total = $d['total_bayar'];
            ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td>#<?= $d['id_transaksi'] ?></td>
                    <td><?= htmlspecialchars($d['nama']) ?></td>
                    <td><?= htmlspecialchars($d['nama_kendaraan']) ?></td>
                    <td><?= $d['tanggal_sewa'] ?></td>
                    <td><?= $d['tanggal_kembali'] ?? '-' ?></td>
                    <td><?= $durasi ?> hari</td>
                    <td>Rp <?= number_format($total, 0, ',', '.') ?></td>
                    <td><span class="badge <?= $badge ?>"><?= $d['status'] ?></span></td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
