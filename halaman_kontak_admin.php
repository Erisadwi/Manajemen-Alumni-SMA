<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Halaman Kontak</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="kontak-page">

<div class="navbar">
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
</div>

<div class="testimonials-section">
    <h2 class="testimonial-title" style="text-align: center;">TESTIMONIALS</h2>
    <p class="testimonial-subtitle" style="text-align: center;">Kisah nyata para alumni SMA 99 Surabaya yang membuktikan bahwa pendidikan, nilai, dan semangat dari sekolah ini terus hidup dalam langkah mereka.
                                                                Melalui testimoni ini, kita melihat bagaimana kenangan sekolah berubah menjadi fondasi kesuksesan di dunia nyata.</p>

    <div class="testimonial-carousel">
        <div class="testimonial-cards">
        <?php
        include 'koneksi.php'; 
        $query = "SELECT * FROM testimonialumni WHERE tampilkan = 1 ORDER BY idtestimoniAlumni DESC";
        $result = mysqli_query($koneksi, $query);

        $index = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $activeClass = $index === 0 ? 'active' : '';
                echo '<div class="testimonial-card ' . $activeClass . '">';
                echo '<p>"' . htmlspecialchars($row['testimoni']) . '"</p>';
                echo '<span>— ' . htmlspecialchars($row['nama_depan']) . ', Alumni ' . htmlspecialchars($row['tahunLulus']) . '</span>';
                echo '</div>';
        $index++;
        }
        ?>
        </div>
    </div>
</div>

<div class="contact-container">

<?php
if (isset($_GET['status']) && $_GET['status'] === 'sukses') {
    echo '<script>alert("Testimoni berhasil terkirim!");</script>';
}
?>

<form class="contact-form" action="proses_testimoni.php" method="post">
    <h3>Bagikan Testimoni Anda</h3>
    <input type="text" name="nama_depan" placeholder="Nama Depan" required>
    <select name="tahunLulus" required>
        <option value="" disabled selected>Pilih Tahun Lulus</option>
        <option value="2024">2024</option>
        <option value="2023">2023</option>
        <option value="2022">2022</option>
        <option value="2021">2021</option>
        <option value="2020">2020</option>
    </select>
    <textarea name="testimoni" placeholder="Tulis testimoni Anda di sini..." required></textarea>
    <button type="submit">Kirim Testimoni</button>
</form>

    <div class="contact-info">
        <h4>Informasi Kontak</h4>
        <p>Alamat: Jl. Pendidikan No.123, Kota Surabaya</p>
        <p>Email: info@sma99sby.sch.id</p>
        <p>Telepon: (021) 1234567</p>
    </div>
</div>

<div class="footer show">
    &copy; 2025 SMA 99 Surabaya. All rights reserved.
</div>

<script>
    const cards = document.querySelectorAll('.testimonial-card');
    let currentIndex = 0;

    function updateSlide(index) {
        cards.forEach((card, i) => {
            card.classList.remove('active');
            if (i === index) {
                card.classList.add('active');
            }
        });
    }

    function autoSlide() {
        currentIndex = (currentIndex + 1) % cards.length;
        updateSlide(currentIndex);
    }

    updateSlide(currentIndex);
    setInterval(autoSlide, 7000); // Geser setiap 7 detik
</script>

</body>
</html>
