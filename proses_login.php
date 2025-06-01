<?php
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];


$query = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username'");
if (!$query) {
    die("Query error: " . mysqli_error($koneksi));
}

$data = mysqli_fetch_assoc($query);


if ($data && $password == $data['password']) {
    $_SESSION['username'] = $data['username'];
    $_SESSION['role'] = $data['role'];

    if ($data['role'] == 'admin') {
        header("Location: index_admin.php");
    } else if ($data['role'] == 'alumni') {
        header("Location: index_alumni.php");
    } else {
        echo "Role tidak dikenali.";
    }
} else {
    echo "Login gagal. <a href='form_login.php'>Coba lagi</a>";
}
?>
