<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $idAlumni = mysqli_real_escape_string($koneksi, $_GET['id']);

    $query = "SELECT * FROM alumni WHERE idAlumni='$idAlumni'";
    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        die ("Query Error: ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
    }

    $data = mysqli_fetch_assoc($result);

    if (!$data) {
        echo "<script>alert('Data tidak ditemukan pada database');window.location='crudAlumni.php';</script>";
        exit;
    }
} else {
    echo "<script>alert('ID Alumni tidak ditemukan');window.location='crudAlumni.php';</script>";
    exit;
}
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Edit Data Alumni</title>
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
        </ul>
      </div>
    </nav>
  </div>
  <center>
    <h1>Edit Data Alumni</h1>
  </center>
  <form method="POST" action="proses_update.php" enctype="multipart/form-data">
    <section class="base">
    <input name="idAlumni" value="<?php echo $data['idAlumni']; ?>" hidden />
        <div>
          <label>Nama Depan</label>
          <input type="text" name="nama_depan" value="<?php echo $data['nama_depan']; ?>" autofocus="" required="" />
        </div>
        <div>
          <label>Nama Belakang</label>
          <input type="text" name="nama_belakang" value="<?php echo $data['nama_belakang']; ?>" autofocus="" required="" />
        </div>
        <div>
          <label>Alamat</label>
         <input type="text" name="alamat" value="<?php echo $data['alamat']; ?>" />
        </div>
        <div>
          <label>No Telepon</label>
         <input type="text" name="noTelepone" required=""value="<?php echo $data['noTelepone']; ?>" />
        </div>
        <div>
          <label>Jurusan</label>
          <select name="jurusan" required>
            <option value="IPA" <?php if ($data['jurusan'] == 'IPA') echo 'selected'; ?>>IPA</option>
            <option value="IPS" <?php if ($data['jurusan'] == 'IPS') echo 'selected'; ?>>IPS</option>
          </select>
        </div>
        <div>
          <label>Tahun Lulus</label>
          <select name="tahunLulus" required>
            <option value="2020" <?php if ($data['tahunLulus'] == '2020') echo 'selected'; ?>>2020</option>
            <option value="2021" <?php if ($data['tahunLulus'] == '2021') echo 'selected'; ?>>2021</option>
            <option value="2022" <?php if ($data['tahunLulus'] == '2022') echo 'selected'; ?>>2022</option>
            <option value="2023" <?php if ($data['tahunLulus'] == '2023') echo 'selected'; ?>>2023</option>
            <option value="2024" <?php if ($data['tahunLulus'] == '2024') echo 'selected'; ?>>2024</option>
          </select>
        </div>
        <div>
          <label>Status</label>
          <select name="status" required>
            <option value="kuliah" <?php if ($data['status'] == 'kuliah') echo 'selected'; ?>>kuliah</option>
            <option value="bekerja" <?php if ($data['status'] == 'bekerja') echo 'selected'; ?>>bekerja</option>
          </select>
        </div>
        <div>
          <label>Institusi</label>
         <input type="text" name="institusi" required="" value="<?php echo $data['institusi']; ?>"/>
        </div>
        <div>
          <label>Foto</label>
          <img src="gambar/<?php echo $data['foto']; ?>" style="width: 120px;float: left;margin-bottom: 5px;">
          <input type="file" name="foto" />
          <i style="float: left;font-size: 11px;color: red">Abaikan jika tidak merubah foto</i>
        </div>
        <div>
         <button type="submit">Simpan Perubahan</button>
        </div>
        </section>
      </form>
  </body>
</html>