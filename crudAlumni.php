<?php
include('koneksi.php');

$searchNama   = isset($_GET['searchNama']) ? $_GET['searchNama'] : '';
$searchTahun  = isset($_GET['searchTahun']) ? $_GET['searchTahun'] : '';
$searchStatus = isset($_GET['searchStatus']) ? $_GET['searchStatus'] : '';

$limit  = isset($_GET['limit']) ? (int)$_GET['limit'] : 15;
$page         = isset($_GET['page']) ? (int)$_GET['page'] : 1;
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
$searchStatus = isset($_GET['searchStatus']) ? $_GET['searchStatus'] : '';
if ($searchStatus !== '') {
    $searchStatus = mysqli_real_escape_string($koneksi, $searchStatus);
    $where[] = "status = '$searchStatus'";
}

$where_sql = count($where) > 0 ? "WHERE " . implode(" AND ", $where) : "";

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
        <div class="logo">Dashboard Admin</div>
        <ul class="nav-links">
          <li><a href="beranda_admin.php">Home</a></li>
          <li><a href="crudAlumni.php">Data Alumni</a></li>
          <li><a href="halaman_statistik_admin.php">Statistik</a></li>
          <li><a href="halaman_kontak_admin.php">Kontak</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
      </div>
    </nav>
  </div>

  <center><h1>Data Alumni SMA 99 Surabaya</h1></center>
  <center>
    <a href="tambah_alumni.php" class="button add-button">+ &nbsp; Tambah Alumni</a>
  </center>

  <div>
    <form method="GET" class="search-form" style="display: flex; justify-content: center; align-items: center; gap: 8px; flex-wrap: nowrap; margin-bottom: 10px;">
      <select name="limit" onchange="this.form.submit()" style="padding: 6px; font-size: 14px; width: 150px;">
        <option value="0" <?= $limit == 0 ? 'selected' : '' ?>>Tampilkan Semua</option>
      <?php for ($i = 15; $i <= 105; $i += 15): ?>
        <option value="<?= $i ?>" <?= $limit == $i ? 'selected' : '' ?>><?= $i ?> per halaman</option>
      <?php endfor; ?>
      </select> 
      
  <select name="searchStatus" onchange="this.form.submit()" style="padding: 6px; font-size: 14px; width: 150px;">
    <option value="" <?php echo ($searchStatus === '') ? 'selected' : ''; ?>>Semua Status</option>
    <option value="kuliah" <?php echo ($searchStatus === 'kuliah') ? 'selected' : ''; ?>>Kuliah</option>
    <option value="Bekerja" <?php echo ($searchStatus === 'Bekerja') ? 'selected' : ''; ?>>Bekerja</option>
  </select>

    <input type="text" name="searchNama" placeholder="Cari Nama Depan" value="<?php echo htmlspecialchars($searchNama); ?>">
    <input type="number" name="searchTahun" placeholder="Tahun Lulus" value="<?php echo htmlspecialchars($searchTahun); ?>">
    
    <button type="submit" style="padding: 6px 12px; font-size: 14px;">Cari</button>
    <button type="button" class="button" onclick="window.location.href='crudAlumni.php'">Reset</button>
    </form>
  </div>
  
  <table>
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
      <th class="action-column">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      if(mysqli_num_rows($result) == 0){
        echo "<tr><td colspan='10' style='text-align:center;'>Data tidak ditemukan</td></tr>";
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
          <td class="action-column">
            <a class="button" href="update_alumni.php?id=<?php echo $row['idAlumni']; ?>">Edit</a>
            <a class="button" href="delete_alumni.php?id=<?php echo $row['idAlumni']; ?>" onclick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</a>
          </td>
        </tr>
      <?php
        }
      }
      ?>
    </tbody>
  </table>

  <?php if ($limit > 0 && $total_pages > 1): ?>
  <div class="pagination" style="text-align:center; margin-top: 20px;">
    <?php for($i = 1; $i <= $total_pages; $i++): ?>
      <?php if ($i == $page): ?>
        <strong style="margin: 0 5px;"><?php echo $i; ?></strong>
      <?php else: ?>
      <a href="?page=<?php echo $i; ?>&searchNama=<?php echo urlencode($searchNama); ?>&searchTahun=<?php echo urlencode($searchTahun); ?>&searchStatus=<?php echo urlencode($searchStatus); ?>&limit=<?php echo $limit; ?>"><?php echo $i; ?></a>
      <?php endif; ?>
    <?php endfor; ?>
  </div>
  <?php endif; ?>

</body>
</html>