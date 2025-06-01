<?php
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];
$role     = $_POST['role']; 


$cek = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username'");
if (!$cek) {
    die("Query error: " . mysqli_error($koneksi));
}

if (mysqli_num_rows($cek) > 0) {
    echo "<script>alert('Username sudah digunakan'); window.location='form_register.php';</script>";
} else {
    $simpan = mysqli_query($koneksi, "INSERT INTO users (username, password, role) VALUES ('$username', '$password', '$role')");
    if ($simpan) {
        echo "<script>alert('Registrasi berhasil'); window.location='form_login.php';</script>";
    } else {
        echo "Gagal menyimpan: " . mysqli_error($koneksi);
    }
}
?>
