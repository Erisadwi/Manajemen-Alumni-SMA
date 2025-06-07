<?php
include('koneksi.php');

$nama_depan = $_POST['nama_depan'];
$tahunLulus = $_POST['tahunLulus'];
$testimoni = $_POST['testimoni'];
$tampilkan = 1;

$stmt = $koneksi->prepare("INSERT INTO testimonialumni (nama_depan, tahunLulus, testimoni, tampilkan) VALUES (?, ?, ?, ?)");
$stmt->bind_param("sssi", $nama_depan, $tahunLulus, $testimoni, $tampilkan);

if ($stmt->execute()) {
    header("Location: halaman_kontak_alumni.php?status=sukses");
    exit();  
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$koneksi->close();
?>


