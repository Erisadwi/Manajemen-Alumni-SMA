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

<div class="testimonials-section">
    <h2 class="testimonial-title">TESTIMONIALS</h2>
    <p class="testimonial-subtitle">Pengalaman para alumni SMA 99 Surabaya</p>

    <div class="testimonial-carousel">
        <div class="testimonial-cards">
            <div class="testimonial-card active">
                <p>"Menjadi siswa di SMA 99 Surabaya adalah batu loncatan utama saya menjadi diplomat. Disiplin dan nilai moral sangat kuat."</p>
                <span>— Clara, Alumni 2015</span>
            </div>
            <div class="testimonial-card">
                <p>"Dulu saya pemalu. Sekarang saya jadi pembicara publik. Terima kasih bimbingan para guru!"</p>
                <span>— Budi, Alumni 2016</span>
            </div>
            <div class="testimonial-card">
                <p>"Ekstrakurikuler robotik SMA 99 mengantar saya ke MIT!"</p>
                <span>— Kevin, Alumni 2018</span>
            </div>
            <div class="testimonial-card">
                <p>"Nilai kepemimpinan dan integritas membuat saya tahan banting di dunia kerja."</p>
                <span>— Sari, Alumni 2022</span>
            </div>
            <div class="testimonial-card">
                <p>"Saya belajar menjadi pendidik sejati dari guru-guru SMA 99."</p>
                <span>— Dinda, Alumni 2019</span>
            </div>
            <div class="testimonial-card">
                <p>"SMA 99 tempat saya belajar konsistensi dan kerja keras. Kini saya CEO di startup teknologi."</p>
                <span>— Rizky, Alumni 2021</span>
            </div>
            <div class="testimonial-card">
                <p>"Pembinaan karakter di sekolah ini sangat berkesan. Membangun karakter saya sejak dini."</p>
                <span>— Maria, Alumni 2024</span>
            </div>
            <div class="testimonial-card">
                <p>"SMA 99 bukan hanya sekolah, tapi rumah kedua bagi saya."</p>
                <span>— Andre, Alumni 2017</span>
            </div>
            <div class="testimonial-card">
                <p>"Saya bangga menjadi alumni SMA 99. Jejaringnya kuat di seluruh Indonesia."</p>
                <span>— Lina, Alumni 2023</span>
            </div>
            <div class="testimonial-card">
                <p>"Guru-gurunya luar biasa, dan saya tidak akan pernah melupakan masa SMA ini."</p>
                <span>— Daniel, Alumni 2020</span>
            </div>
        </div>
    </div>
</div>

<div class="contact-container">
    
    <?php
    if (isset($_GET['status']) && $_GET['status'] === 'sukses') {
        echo '<p style="color: green; font-weight: bold; margin-bottom: 15px;">Testimoni berhasil terkirim!</p>';
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
    setInterval(autoSlide, 7000); 
</script>

</body>
</html>
