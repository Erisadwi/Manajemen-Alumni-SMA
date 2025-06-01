<?php
include 'koneksi.php';

if (!isset($_GET['id'])) {
    echo "ID alumni tidak ditemukan.";
    exit;
}

$idAlumni = (int)$_GET['id']; 

$sql = "DELETE FROM alumni WHERE idAlumni = $idAlumni";

if ($koneksi->query($sql)) {
    echo "<script>alert('Data berhasil dihapus'); window.location='crudAlumni.php';</script>";
} else {
    echo "Gagal hapus data: " . $koneksi->error;
}
?>

