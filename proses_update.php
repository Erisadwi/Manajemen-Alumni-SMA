<?php
include 'koneksi.php';

$idAlumni       = $_POST['idAlumni'];
$nama_depan     = $_POST['nama_depan'];
$nama_belakang  = $_POST['nama_belakang'];
$alamat         = $_POST['alamat'];
$noTelepone     = $_POST['noTelepone'];
$jurusan        = $_POST['jurusan'];
$tahunLulus     = $_POST['tahunLulus'];
$status         = $_POST['status'];
$institusi      = $_POST['institusi'];
$foto           = $_FILES['foto']['name'];

if ($foto != "") {
    $ekstensi_diperbolehkan = ['png', 'jpg'];
    $x = explode('.', $foto);
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['foto']['tmp_name'];
    $angka_acak = rand(1,999);
    $nama_gambar_baru = $angka_acak . '-' . $foto;

    if (in_array($ekstensi, $ekstensi_diperbolehkan)) {
        move_uploaded_file($file_tmp, 'gambar/' . $nama_gambar_baru);

        $query = "UPDATE alumni SET 
                    nama_depan = '$nama_depan',
                    nama_belakang = '$nama_belakang',
                    alamat = '$alamat',
                    noTelepone = '$noTelepone',
                    jurusan = '$jurusan',
                    tahunLulus = '$tahunLulus',
                    status = '$status',
                    institusi = '$institusi',
                    foto = '$nama_gambar_baru'
                  WHERE idAlumni = '$idAlumni'";
    } else {
        echo "<script>alert('Ekstensi gambar yang diperbolehkan hanya .jpg atau .png');window.location='update_alumni.php';</script>";
        exit;
    }
} else {
    $query = "UPDATE alumni SET 
                nama_depan = '$nama_depan',
                nama_belakang = '$nama_belakang',
                alamat = '$alamat',
                noTelepone = '$noTelepone',
                jurusan = '$jurusan',
                tahunLulus = '$tahunLulus',
                status = '$status',
                institusi = '$institusi'
              WHERE idAlumni = '$idAlumni'";
}

$result = mysqli_query($koneksi, $query);

if (!$result) {
    die ("Query gagal: ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
} else {
    echo "<script>alert('Data berhasil diubah.');window.location='crudAlumni.php';</script>";
}
?>
