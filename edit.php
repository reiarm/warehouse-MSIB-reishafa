<?php
session_start();
require_once 'Gudang.php';
require_once 'db.php';

$gudang = new Gudang($conn);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $location = $_POST['location'];
    $capacity = $_POST['capacity'];
    $status = $_POST['status'];
    $opening_hour = $_POST['opening_hour'];
    $closing_hour = $_POST['closing_hour'];

    $gudang->update($id, $name, $location, $capacity, $status, $opening_hour, $closing_hour);
    $_SESSION['success_message'] = "Gudang berhasil diperbarui.";
    header("Location: index.php");
    exit;
}

$id = $_GET['id'];
$gudang = new Gudang($conn);
$gudang_data = $gudang->getById($id);
?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Gudang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1 class="text-center mb-4">Edit Gudang</h1>
    <form method="POST" action="">
        <input type="hidden" name="id" value="<?= $gudang_data['id'] ?>">
        <div class="mb-3">
            <label for="name" class="form-label">Nama Gudang:</label>
            <input type="text" name="name" id="name" value="<?= htmlspecialchars($gudang_data['name']) ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="location" class="form-label">Lokasi:</label>
            <input type="text" name="location" id="location" value="<?= htmlspecialchars($gudang_data['location']) ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="capacity" class="form-label">Kapasitas:</label>
            <input type="number" name="capacity" id="capacity" value="<?= htmlspecialchars($gudang_data['capacity']) ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status:</label>
            <select name="status" id="status" class="form-select" required>
                <option value="aktif" <?= $gudang_data['status'] == 'aktif' ? 'selected' : '' ?>>Aktif</option>
                <option value="tidak_aktif" <?= $gudang_data['status'] == 'tidak_aktif' ? 'selected' : '' ?>>Tidak Aktif</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="opening_hour" class="form-label">Jam Buka:</label>
            <input type="time" name="opening_hour" id="opening_hour" value="<?= $gudang_data['opening_hour'] ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="closing_hour" class="form-label">Jam Tutup:</label>
            <input type="time" name="closing_hour" id="closing_hour" value="<?= $gudang_data['closing_hour'] ?>" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Perbarui Gudang</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>