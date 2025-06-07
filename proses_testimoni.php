<?php
include('koneksi.php');

$nama_depan = $_POST['nama_depan'];
$tahunLulus = $_POST['tahunLulus'];
$testimoni = $_POST['testimoni'];

$stmt = $koneksi->prepare("INSERT INTO testimonialumni (nama_depan, tahunLulus, testimoni, ditampilkan) VALUES (?, ?, ?, TRUE)");
$stmt->bind_param("sss", $nama_depan, $tahunLulus, $testimoni);

if ($stmt->execute()) {
    echo "Testimoni berhasil dikirim!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$koneksi->close();
?>
