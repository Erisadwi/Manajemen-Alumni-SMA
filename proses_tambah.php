<?php

include 'koneksi.php';

  $idAlumni   = $_POST['idAlumni'];
  $nama_depan    = $_POST['nama_depan'];
  $nama_belakang   = $_POST['nama_belakang'];
  $alamat    = $_POST['alamat'];
  $noTelepone   = $_POST['noTelepone'];
  $jurusan  = $_POST['jurusan'];
  $tahunLulus   = $_POST['tahunLulus'];
  $status  = $_POST['status'];
  $institusi    = $_POST['institusi'];
  $foto = $_FILES['foto']['name'];

if($foto != "") {
  $ekstensi_diperbolehkan = array('png','jpg'); 
  $x = explode('.', $foto); //memisahkan nama file dengan ekstensi yang diupload
  $ekstensi = strtolower(end($x));
  $file_tmp = $_FILES['foto']['tmp_name'];   
  $angka_acak     = rand(1,999);
  $nama_gambar_baru = $angka_acak.'-'.$foto; //menggabungkan angka acak dengan nama file sebenarnya
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
                move_uploaded_file($file_tmp, 'gambar/'.$nama_gambar_baru); 

                  $query = "INSERT INTO alumni (idAlumni, nama_depan, nama_belakang, alamat, noTelepone, jurusan, tahunLulus, status, institusi, foto) VALUES ('$idAlumni', '$nama_depan', '$nama_belakang', '$alamat', '$noTelepone', '$jurusan', '$tahunLulus', '$status', '$institusi', '$nama_gambar_baru')";
                  $result = mysqli_query($koneksi, $query);

                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                           " - ".mysqli_error($koneksi));
                  } else {
                    echo "<script>alert('Data berhasil ditambah.');window.location='crudAlumni.php';</script>";
                  }

            } else {     
                echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='tambah_produk.php';</script>";
            }
} else {
   $query = "INSERT INTO alumni (idAlumni, nama_depan, nama_belakang, alamat, noTelepone, jurusan, tahunLulus, status, institusi, foto) VALUES ('$idAlumni', '$nama_depan', '$nama_belakang', '$alamat', '$noTelepone', '$jurusan', '$tahunLulus', '$status', '$institusi', null)";
                  $result = mysqli_query($koneksi, $query);

                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                           " - ".mysqli_error($koneksi));
                  } else {

                    echo "<script>alert('Data berhasil ditambah.');window.location='crudAlumni.php';</script>";
                  }
}
