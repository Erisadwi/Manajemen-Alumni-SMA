<?php
include('koneksi.php');

$searchNama   = isset($_GET['searchNama']) ? $_GET['searchNama'] : '';
$searchTahun  = isset($_GET['searchTahun']) ? $_GET['searchTahun'] : '';
$searchStatus = isset($_GET['searchStatus']) ? $_GET['searchStatus'] : '';
$page         = isset($_GET['page']) ? (int)$_GET['page'] : 1;

$limit  = isset($_GET['limit']) ? (int)$_GET['limit'] : 15;
$offset = ($page - 1) * $limit;

$where = [];
if ($searchNama !== '') {
    $searchNama = mysqli_real_escape_string($koneksi, $searchNama);
    $where[] = "nama_depan LIKE '%$searchNama%'";
}
if ($searchTahun !== '') {
    $searchTahun = mysqli_real_escape_string($koneksi, $searchTahun);
    $where[] = "tahunLulus = '$searchTahun'";
}
if ($searchStatus !== '') {
    $searchStatus = mysqli_real_escape_string($koneksi, $searchStatus);
    $where[] = "status = '$searchStatus'";
}

$where_sql = (count($where) > 0) ? 'WHERE ' . implode(' AND ', $where) : '';

$count_query  = "SELECT COUNT(*) AS total FROM alumni $where_sql";
$count_result = mysqli_query($koneksi, $count_query);
$count_row    = mysqli_fetch_assoc($count_result);
$total_data   = $count_row['total'];
$total_pages  = ($limit > 0) ? ceil($total_data / $limit) : 1;

$query = "SELECT * FROM alumni $where_sql ORDER BY idAlumni ASC";
if ($limit > 0) {
    $query .= " LIMIT $limit OFFSET $offset";
}
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Manajemen Data Alumni SMA</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
<div class="wrapper">
  <nav class="navbar">
    <div class="navbar-container">
      <div class="logo">Dashboard Alumni</div>
      <ul class="nav-links">
        <li><a href="beranda_alumni.php">Home</a></li>
        <li><a href="dataAlumni.php">Data Alumni</a></li>
        <li><a href="halaman_statistik_alumni.php">Statistik</a></li>
        <li><a href="halaman_kontak_alumni.php">Kontak</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </div>
  </nav>
</div>

<center><h1>Data Alumni SMA 99 Surabaya</h1></center>

<form method="GET" class="search-form" style="display: flex; justify-content: center; align-items: center; gap: 8px; flex-wrap: nowrap; margin-bottom: 10px;">
  <select name="limit" onchange="this.form.submit()" style="padding: 6px; font-size: 14px; width: 150px;">
      <option value="0" <?= $limit == 0 ? 'selected' : '' ?>>Tampilkan Semua</option>
    <?php for ($i = 15; $i <= 105; $i += 15): ?>
      <option value="<?= $i ?>" <?= $limit == $i ? 'selected' : '' ?>><?= $i ?> per halaman</option>
    <?php endfor; ?>
  </select>

  <select name="searchStatus" onchange="this.form.submit()" style="padding: 6px; font-size: 14px; width: 150px;">
    <option value="" <?= $searchStatus === '' ? 'selected' : '' ?>>Semua Status</option>
    <option value="kuliah" <?= $searchStatus === 'kuliah' ? 'selected' : '' ?>>Kuliah</option>
    <option value="Bekerja" <?= $searchStatus === 'Bekerja' ? 'selected' : '' ?>>Bekerja</option>
  </select>

  <input type="text" name="searchNama" placeholder="Cari Nama Depan" value="<?= htmlspecialchars($searchNama) ?>" style="padding: 6px; font-size: 14px; width: 150px;">
  <input type="number" name="searchTahun" placeholder="Tahun Lulus" value="<?= htmlspecialchars($searchTahun) ?>" style="padding: 6px; font-size: 14px; width: 120px;">

  <button type="submit" style="padding: 6px 12px; font-size: 14px;">Cari</button>
  <button type="button" onclick="window.location.href='dataAlumni.php'" style="padding: 6px 12px; font-size: 14px;">Reset</button>
</form>

<table border="1" cellpadding="8" cellspacing="0" style="margin: auto; width: 95%;">
  <thead>
    <tr>
      <th style="text-align: center;">Id</th>
      <th style="text-align: center;">Nama Lengkap</th>
      <th style="text-align: center;">Alamat</th>
      <th style="text-align: center;">No Telepon</th>
      <th style="text-align: center;">Jurusan</th>
      <th style="text-align: center;">Tahun Lulus</th>
      <th style="text-align: center;">Status</th>
      <th style="text-align: center;">Institusi</th>
      <th style="text-align: center;">Foto</th>
    </tr>
  </thead>
  <tbody>
    <?php if (mysqli_num_rows($result) == 0): ?>
      <tr><td colspan="9" style="text-align:center;">Data tidak ditemukan</td></tr>
    <?php else: ?>
      <?php while($row = mysqli_fetch_assoc($result)): ?>
        <tr>
          <td><?= $row['idAlumni'] ?></td>
          <td><?= $row['nama_depan'] . ' ' . $row['nama_belakang'] ?></td>
          <td><?= $row['alamat'] ?></td>
          <td><?= $row['noTelepone'] ?></td>
          <td><?= $row['jurusan'] ?></td>
          <td><?= $row['tahunLulus'] ?></td>
          <td><?= $row['status'] ?></td>
          <td><?= $row['institusi'] ?></td>
          <td style="text-align: center;">
            <img src="gambar/<?= $row['foto'] ?>" style="width: 50px;">
          </td>
        </tr>
      <?php endwhile; ?>
    <?php endif; ?>
  </tbody>
</table>

<?php if ($limit > 0 && $total_pages > 1): ?>
<div class="pagination" style="text-align:center; margin-top: 20px;">
  <?php for($i = 1; $i <= $total_pages; $i++): ?>
    <?php if ($i == $page): ?>
      <strong style="margin: 0 5px;"><?= $i ?></strong>
    <?php else: ?>
      <a href="?page=<?= $i ?>&searchNama=<?= urlencode($searchNama) ?>&searchTahun=<?= urlencode($searchTahun) ?>&searchStatus=<?= urlencode($searchStatus) ?>&limit=<?= $limit ?>"><?= $i ?></a>
    <?php endif; ?>
  <?php endfor; ?>
</div>
<?php endif; ?>

</body>
</html>
