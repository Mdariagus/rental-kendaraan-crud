<?php
include "../../koneksi.php";
include "../partials/sidebar.php";

$data = mysqli_query($koneksi, "SELECT * FROM customer ORDER BY id_customer DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Customer</title>
</head>
<body>

<div class="main-content">
    <a href="../dashboard.php" class="btn-back">← Kembali ke Dashboard</a>

    <div class="table-card">
        <div class="table-header">
            <h2>Data Customer</h2>
            <a href="tambah.php" class="btn-add">+ Tambah Customer</a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>No HP</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
            <?php $no = 1; while($d = mysqli_fetch_assoc($data)): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><strong><?= htmlspecialchars($d['nama']) ?></strong></td>
                    <td><?= htmlspecialchars($d['alamat']) ?></td>
                    <td><?= htmlspecialchars($d['no_hp']) ?></td>
                    <td>
                        <a href="detail.php?id=<?= $d['id_customer'] ?>" class="btn-detail">Detail</a>
                        <a href="edit.php?id=<?= $d['id_customer'] ?>" class="btn-edit">Edit</a>
                        <a href="hapus.php?id=<?= $d['id_customer'] ?>" class="btn-delete"
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
