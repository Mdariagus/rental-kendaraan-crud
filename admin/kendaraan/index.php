<?php
include "../../koneksi.php";
include "../partials/sidebar.php";

$data = mysqli_query($koneksi, "SELECT * FROM kendaraan ORDER BY id_kendaraan DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Kendaraan</title>
</head>
<body>

<div class="main-content">
    <a href="../dashboard.php" class="btn-back">← Kembali ke Dashboard</a>

    <div class="table-card">
        <div class="table-header">
            <h2>Data Kendaraan</h2>
            <a href="tambah.php" class="btn-add">+ Tambah Kendaraan</a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kendaraan</th>
                    <th>Merk</th>
                    <th>Plat Nomor</th>
                    <th>Tahun</th>
                    <th>Harga Sewa</th>
                    <th>Status</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
            <?php $no = 1; while($d = mysqli_fetch_assoc($data)): 
                $badge = $d['status'] == 'Tersedia' ? 'badge-green' : 'badge-blue';
            ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><strong><?= htmlspecialchars($d['nama_kendaraan']) ?></strong></td>
                    <td><?= htmlspecialchars($d['merk']) ?></td>
                    <td><?= htmlspecialchars($d['plat_nomor']) ?></td>
                    <td><?= $d['tahun'] ?></td>
                    <td>Rp <?= number_format($d['harga_sewa'], 0, ',', '.') ?></td>
                    <td><span class="badge <?= $badge ?>"><?= $d['status'] ?></span></td>
                    <td>
                        <a href="edit.php?id=<?= $d['id_kendaraan'] ?>" class="btn-edit">Edit</a>
                        <a href="hapus.php?id=<?= $d['id_kendaraan'] ?>" class="btn-delete"
                           onclick="return confirm('Yakin hapus data ini?')">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
