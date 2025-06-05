<?php
  include('koneksi.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Tambah Data Alumni</title>
  <link rel="stylesheet" href="navbar.css" />
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <div class="wrapper">
    <nav class="navbar">
      <div class="navbar-container">
        <div class="logo">Dashboard Admin</div>
        <ul class="nav-links">
          <li><a href="index_admin.php">Home</a></li>
          <li><a href="crudAlumni.php">Data Alumni</a></li>
          <li><a href="halaman_statistik_admin.php">Statistik</a></li>
          <li><a href="halaman_kontak_admin.php">Kontak</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
      </div>
    </nav>
  </div>
  <center>
    <h1>Tambah Data Alumni</h1>
  </center>
  <form method="POST" action="proses_tambah.php" enctype="multipart/form-data">
    <section class="base">
      <div>
        <label>ID Alumni</label>
        <input type="text" name="idAlumni" required />
      </div>
      <div>
        <label>Nama Depan</label>
        <input type="text" name="nama_depan" required />
      </div>
      <div>
        <label>Nama Belakang</label>
        <input type="text" name="nama_belakang" required />
      </div>
      <div>
        <label>Alamat</label>
        <input type="text" name="alamat" required />
      </div>
      <div>
        <label>No Telepon</label>
        <input type="text" name="noTelepone" required />
      </div>
      <div>
        <label>Jurusan</label>
        <select name="jurusan" required>
          <option value="IPA">IPA</option>
          <option value="IPS">IPS</option>
        </select>
      </div>
      <div>
        <label>Tahun Lulus</label>
        <select name="tahunLulus" required>
          <option value="2020">2020</option>
          <option value="2021">2021</option>
          <option value="2022">2022</option>
          <option value="2023">2023</option>
          <option value="2024">2024</option>
        </select>
      </div>
      <div>
        <label>Status</label>
        <select name="status" required>
          <option value="kuliah">kuliah</option>
          <option value="bekerja">bekerja</option>
        </select>
      </div>
      <div>
        <label>Institusi</label>
        <input type="text" name="institusi" required />
      </div>
      <div>
        <label>Foto</label>
        <input type="file" name="foto" required />
      </div>
      <div>
        <button type="submit">Simpan Data Alumni</button>
      </div>
    </section>
  </form>
</body>
</html>
