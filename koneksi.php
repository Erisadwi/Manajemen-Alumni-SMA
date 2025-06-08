<?php
  $host = "localhost"; 
  $user = "root";
  $pass = "Dewicantik11";
  $nama_db = "manajemenalumni"; 
  $koneksi = mysqli_connect($host, $user, $pass, $nama_db); 

  if(!$koneksi){ 
    die ("Koneksi dengan database gagal: " . mysqli_connect_error());
  }
?>
