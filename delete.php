<?php
session_start();
require_once 'Gudang.php';
require_once 'db.php';

$gudang = new Gudang($conn);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $gudang->delete($id);
    $_SESSION['success_message'] = "Gudang berhasil dihapus.";
    header("Location: index.php");
    exit;
}
?>