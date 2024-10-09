<?php
session_start();
require_once 'Gudang.php';
require_once 'db.php';

$gudang = new Gudang($conn);
$gudang_list = $gudang->read();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Sistem Gudang MSIB</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<div class="container mt-5">
    <h1 class="text-center mb-4">Daftar Gudang</h1>
    <a href="create.php" class="btn btn-primary mb-3">Tambah Gudang</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nama Gudang</th>
                <th>Lokasi</th>
                <th>Kapasitas</th>
                <th>Status</th>
                <th>Jam Buka</th>
                <th>Jam Tutup</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($gudang_list as $gudang): ?>
                <tr>
                    <td><?= htmlspecialchars($gudang['name']) ?></td>
                    <td><?= htmlspecialchars($gudang['location']) ?></td>
                    <td><?= htmlspecialchars($gudang['capacity']) ?></td>
                    <td><?= htmlspecialchars($gudang['status']) ?></td>
                    <td><?= htmlspecialchars($gudang['opening_hour']) ?></td>
                    <td><?= htmlspecialchars($gudang['closing_hour']) ?></td>
                    <td>
                        <a href="edit.php?id=<?= $gudang['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        <button class="btn btn-danger btn-sm" onclick="confirmDelete(<?= $gudang['id'] ?>)">Hapus</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script>
function confirmDelete(id) {
    Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "Data ini akan dihapus secara permanen!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "delete.php?id=" + id;
        }
    });
}
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>