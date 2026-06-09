<?php
include "../../koneksi.php";
include "../partials/sidebar.php";

$data = mysqli_query($koneksi, "
    SELECT t.*, c.nama, k.nama_kendaraan
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
    <title>Data Transaksi</title>
</head>
<body>

<div class="main-content">
    <a href="../dashboard.php" class="btn-back">← Kembali ke Dashboard</a>

    <div class="table-card">
        <div class="table-header">
            <h2>Data Transaksi</h2>
        </div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Customer</th>
                    <th>Kendaraan</th>
                    <th>Tgl Sewa</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php while($d = mysqli_fetch_assoc($data)):
                $badge = match($d['status']) {
                    'Menunggu'  => 'badge-orange',
                    'Disetujui' => 'badge-blue',
                    'Selesai'   => 'badge-green',
                    default     => 'badge-gray'
                };
            ?>
                <tr>
                    <td>#<?= $d['id_transaksi'] ?></td>
                    <td><strong><?= htmlspecialchars($d['nama']) ?></strong></td>
                    <td><?= htmlspecialchars($d['nama_kendaraan']) ?></td>
                    <td><?= $d['tanggal_sewa'] ?></td>
                    <td><span class="badge <?= $badge ?>"><?= $d['status'] ?></span></td>
                    <td>
                        <a href="detail.php?id=<?= $d['id_transaksi'] ?>" class="btn-detail">Detail</a>
                        <?php if($d['status'] == "Menunggu"): ?>
                            <a href="konfirmasi.php?id=<?= $d['id_transaksi'] ?>" class="btn-confirm">Konfirmasi</a>
                        <?php endif; ?>
                        <?php if($d['status'] == "Disetujui"): ?>
                            <a href="selesai.php?id=<?= $d['id_transaksi'] ?>" class="btn-done">Selesai</a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
