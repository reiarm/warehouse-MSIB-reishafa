<?php
session_start();
require_once 'Gudang.php';
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $gudang = new Gudang($conn);
    $name = $_POST['name'];
    $location = $_POST['location'];
    $capacity = $_POST['capacity'];
    $status = $_POST['status'];
    $opening_hour = $_POST['opening_hour'];
    $closing_hour = $_POST['closing_hour'];

    $gudang->create($name, $location, $capacity, $status, $opening_hour, $closing_hour);
    $_SESSION['success_message'] = "Gudang berhasil ditambahkan.";
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Gudang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1 class="text-center mb-4">Tambah Gudang</h1>
    <form method="POST" action="">
        <div class="mb-3">
            <label for="name" class="form-label">Nama Gudang:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="location" class="form-label">Lokasi:</label>
            <input type="text" name="location" id="location" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="capacity" class="form-label">Kapasitas:</label>
            <input type="number" name="capacity" id="capacity" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status:</label>
            <select name="status" id="status" class="form-select" required>
                <option value="aktif">Aktif</option>
                <option value="tidak_aktif">Tidak Aktif</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="opening_hour" class="form-label">Jam Buka:</label>
            <input type="time" name="opening_hour" id="opening_hour" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="closing_hour" class="form-label">Jam Tutup:</label>
            <input type="time" name="closing_hour" id="closing_hour" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Tambah Gudang</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>