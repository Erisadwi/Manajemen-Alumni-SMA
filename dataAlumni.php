<?php
include('koneksi.php');

$searchNama = isset($_GET['searchNama']) ? $_GET['searchNama'] : '';
$searchTahun = isset($_GET['searchTahun']) ? $_GET['searchTahun'] : '';
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$showAll = isset($_GET['show']) && $_GET['show'] == 'all';

$limit = 15;
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

$where_sql = '';
if (count($where) > 0) {
    $where_sql = "WHERE " . implode(" AND ", $where);
}

$count_query = "SELECT COUNT(*) AS total FROM alumni $where_sql";
$count_result = mysqli_query($koneksi, $count_query);
$count_row = mysqli_fetch_assoc($count_result);
$total_data = $count_row['total'];
$total_pages = ceil($total_data / $limit);

$query = "SELECT * FROM alumni $where_sql ORDER BY idAlumni ASC";
if (!$showAll) {
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
  <link rel="stylesheet" href="navbar.css" />
  <link rel="stylesheet" href="style.css" />
</head>
<body>
<div class="wrapper">
    <nav class="navbar">
      <div class="navbar-container">
        <div class="logo">Dashboard Alumni</div>
        <ul class="nav-links">
          <li><a href="index_alumni.php">Home</a></li>
          <li><a href="dataAlumni.php">Data Alumni</a></li>
          <li><a href="halaman_statistik_alumni.php">Statistik</a></li>
          <li><a href="halaman_kontak_alumni.php">Kontak</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
      </div>
    </nav>
</div>

<center><h1>Data Alumni SMA 99 Surabaya</h1></center>

<form method="GET" class="search-form" style="text-align: center; margin-bottom: 10px;">
  <input type="text" name="searchNama" placeholder="Cari Nama Depan" value="<?php echo htmlspecialchars($searchNama); ?>">
  <input type="number" name="searchTahun" placeholder="Tahun Lulus" value="<?php echo htmlspecialchars($searchTahun); ?>">
  <button type="submit">Cari</button>
  <a href="dataAlumni.php" class="button" style="background-color:#ccc; color:#333; margin-left:10px;">Reset</a>
</form>

<table border="1" cellpadding="8" cellspacing="0" style="margin: auto; width: 95%;">
  <thead>
    <tr>
      <th>Id</th>
      <th>Nama Lengkap</th>
      <th>Alamat</th>
      <th>No Telepon</th>
      <th>Jurusan</th>
      <th>Tahun Lulus</th>
      <th>Status</th>
      <th>Institusi</th>
      <th>Foto</th>
    </tr>
  </thead>
  <tbody>
    <?php
    if(mysqli_num_rows($result) == 0){
      echo "<tr><td colspan='9' style='text-align:center;'>Data tidak ditemukan</td></tr>";
    } else {
      while($row = mysqli_fetch_assoc($result)){
    ?>
      <tr>
        <td><?php echo $row['idAlumni']; ?></td>
        <td><?php echo $row['nama_depan'] . ' ' . $row['nama_belakang']; ?></td>
        <td><?php echo $row['alamat']; ?></td>
        <td><?php echo $row['noTelepone']; ?></td>
        <td><?php echo $row['jurusan']; ?></td>
        <td><?php echo $row['tahunLulus']; ?></td>
        <td><?php echo $row['status']; ?></td>
        <td><?php echo $row['institusi']; ?></td>
        <td style="text-align: center;">
          <img src="gambar/<?php echo $row['foto']; ?>" style="width: 50px;">
        </td>
      </tr>
    <?php
      }
    }
    ?>
  </tbody>
</table>

<div style="text-align:center; margin-bottom: 20px;">
  <?php if (!$showAll): ?>
    <a href="?show=all&searchNama=<?php echo urlencode($searchNama); ?>&searchTahun=<?php echo urlencode($searchTahun); ?>" class="button" style="background-color:#007bff; color:white; padding: 8px 16px; border-radius: 4px; text-decoration:none;">Tampilkan Semua</a>
  <?php else: ?>
    <a href="dataAlumni.php?searchNama=<?php echo urlencode($searchNama); ?>&searchTahun=<?php echo urlencode($searchTahun); ?>" class="button" style="background-color:#007bff; color:white; padding: 8px 16px; border-radius: 4px; text-decoration:none;">Tampilkan Per Halaman</a>
  <?php endif; ?>
</div>

<?php if (!$showAll && $total_pages > 1): ?>
<div class="pagination" style="text-align:center; margin-top: 20px;">
  <?php for($i = 1; $i <= $total_pages; $i++): ?>
    <?php if ($i == $page): ?>
      <strong style="margin: 0 5px;"><?php echo $i; ?></strong>
    <?php else: ?>
      <a href="?page=<?php echo $i; ?>&searchNama=<?php echo urlencode($searchNama); ?>&searchTahun=<?php echo urlencode($searchTahun); ?>"><?php echo $i; ?></a>
    <?php endif; ?>
  <?php endfor; ?>
</div>
<?php endif; ?>

</body>
</html>

