<?php
include "../koneksi.php";
include "partials/sidebar.php";

$total_customer = mysqli_num_rows(
    mysqli_query($koneksi, "SELECT * FROM customer")
);

$total_kendaraan = mysqli_num_rows(
    mysqli_query($koneksi, "SELECT * FROM kendaraan")
);

$total_transaksi = mysqli_num_rows(
    mysqli_query($koneksi, "SELECT * FROM transaksi")
);

// Total pendapatan dari transaksi selesai
$q_pendapatan = mysqli_query($koneksi, "
    SELECT SUM(
        k.harga_sewa * DATEDIFF(t.tanggal_kembali, t.tanggal_sewa)
    ) as total
    FROM transaksi t
    JOIN kendaraan k ON t.id_kendaraan = k.id_kendaraan
    WHERE t.status = 'Selesai'
");
$pendapatan = mysqli_fetch_assoc($q_pendapatan);
$total_pendapatan = $pendapatan['total'] ?? 0;

// Kendaraan aktif di jalan (status Disetujui)
$aktif = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM transaksi WHERE status='Disetujui'"));

// Transaksi pending
$pending = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM transaksi WHERE status='Menunggu'"));
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
</head>
<body>

<div class="main-content">
    <div class="page-title">Dashboard</div>

    <div class="stats-grid">

        <div class="stat-card stat-blue">
            <div class="stat-label">TOTAL PENDAPATAN</div>
            <div class="stat-value">Rp <?= number_format($total_pendapatan, 0, ',', '.') ?></div>
            <div class="stat-desc">Termasuk Uang Denda</div>
        </div>

        <div class="stat-card">
            <div class="stat-label">TOTAL TRANSAKSI</div>
            <div class="stat-value"><?= $total_transaksi ?></div>
            <div class="stat-desc"><?= $pending ?> Pending (COD Ambil)</div>
        </div>

        <div class="stat-card">
            <div class="stat-label">Aktif di Jalan</div>
            <div class="stat-value"><?= $aktif ?></div>
            <div class="stat-desc">Jaminan Identitas Ditahan</div>
        </div>

        <div class="stat-card">
            <div class="stat-label">Total Kendaraan</div>
            <div class="stat-value"><?= $total_kendaraan ?></div>
            <div class="stat-desc">Total armada terdaftar</div>
        </div>

    </div>

    <!-- Transaksi Terbaru -->
    <div style="margin-top:32px;">
        <div class="table-card">
            <div class="table-header">
                <h2>Transaksi Terbaru</h2>
                <a href="transaksi/index.php" class="btn-add">Lihat Semua</a>
            </div>
            <?php
            $recent = mysqli_query($koneksi, "
                SELECT t.*, c.nama, k.nama_kendaraan
                FROM transaksi t
                JOIN customer c ON t.id_customer = c.id_customer
                JOIN kendaraan k ON t.id_kendaraan = k.id_kendaraan
                ORDER BY t.id_transaksi DESC
                LIMIT 5
            ");
            ?>
            <table>
                <thead>
                    <tr>
                        <th>Customer</th>
                        <th>Kendaraan</th>
                        <th>Tgl Sewa</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                <?php while($r = mysqli_fetch_assoc($recent)): 
                    $badge = match($r['status']) {
                        'Menunggu'  => 'badge-orange',
                        'Disetujui' => 'badge-blue',
                        'Selesai'   => 'badge-green',
                        default     => 'badge-gray'
                    };
                ?>
                    <tr>
                        <td><?= htmlspecialchars($r['nama']) ?></td>
                        <td><?= htmlspecialchars($r['nama_kendaraan']) ?></td>
                        <td><?= $r['tanggal_sewa'] ?></td>
                        <td><span class="badge <?= $badge ?>"><?= $r['status'] ?></span></td>
                    </tr>
                <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
.stats-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
}

.stat-card {
    background: white;
    border-radius: 14px;
    padding: 24px;
    box-shadow: 0 1px 4px rgba(0,0,0,0.07);
}

.stat-label {
    font-size: 11px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.08em;
    color: #94a3b8;
    margin-bottom: 10px;
}

.stat-value {
    font-size: 32px;
    font-weight: 700;
    color: #1e293b;
    line-height: 1.1;
    margin-bottom: 8px;
}

.stat-desc {
    font-size: 12px;
    color: #94a3b8;
}

@media(max-width: 768px) {
    .stats-grid { grid-template-columns: 1fr; }
}
</style>

</body>
</html>
