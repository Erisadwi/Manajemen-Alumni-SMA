<?php
include 'koneksi.php';

$query = "SELECT tahunLulus, COUNT(*) as jumlah FROM alumni GROUP BY tahunLulus ORDER BY tahunLulus ASC";
$result = mysqli_query($koneksi, $query);

$labels = [];
$data = [];

while ($row = $result->fetch_assoc()) {
    $labels[] = $row['tahunLulus'];
    $data[] = $row['jumlah'];
}

$koneksi->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Statistik Alumni per Tahun</title>
    <link rel="stylesheet" href="style.css"> 
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<div class="navbar">
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
</div>

<div class="content">
    <h2>Statistik Alumni per Tahun</h2>
    <p class="deskripsi">Grafik berikut menunjukkan jumlah alumni dari tahun ke tahun berdasarkan data terkini dari sistem.</p>

    <div class="chart-container">
        <canvas id="alumniChart"></canvas>
    </div>
</div>

<div class="footer show">
    &copy; 2025 SMA Contoh. All rights reserved.
</div>

<script>
    const ctx = document.getElementById('alumniChart').getContext('2d');
    const alumniChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?= json_encode($labels); ?>,
            datasets: [{
                label: 'Jumlah Alumni',
                data: <?= json_encode($data); ?>,
                backgroundColor: '#A0522D'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

</body>
</html>
