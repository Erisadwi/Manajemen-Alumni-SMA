<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Halaman Kontak</title>
    <link rel="stylesheet" href="style.css"> 
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
    <h2>Testimoni Alumni</h2>
    <p class="deskripsi">Silakan kirim testimoni melalui form berikut ini</p>

    <div class="contact-container">
        <form class="contact-form" action="proses_testimoni.php" method="post">
            <input type="text" name="nama_depan" placeholder="Nama Depan" required>
            <select name="tahunLulus" required>
                <option value="" disabled selected>Tahun Lulus</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
            </select>
            <textarea name="testimoni" placeholder="Testimoni" required></textarea>
            <button type="submit">Kirim</button>
        </form>

        <div class="contact-info">
            <h4>Informasi Kontak</h4>
            <p>Alamat: Jl. Pendidikan No.123, Kota Surabaya</p>
            <p>Email: info@sma99sby.sch.id</p>
            <p>Telepon: (021) 1234567</p>
        </div>
    </div>
</div>

<div class="footer show">
    &copy; 2025 SMA 99 Surabaya. All rights reserved.
</div>

</body>
</html>
