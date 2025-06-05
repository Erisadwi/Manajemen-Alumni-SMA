<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin - Halaman Utama</title>
  <link rel="stylesheet" href="navbar.css" />
  <link rel="stylesheet" href="style.css" />

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

    <div class="content">

      <div class="carousel-container">
        <div class="carousel" id="carousel">
          <img src="img/foto 1.jpg" alt="Slide 1" class="carousel-slide active">
          <img src="img/foto 2.jpg" alt="Slide 2" class="carousel-slide">
          <img src="img/foto 3.jpg" alt="Slide 3" class="carousel-slide">
        </div>
        <button class="carousel-btn prev" onclick="prevSlide()">❮</button>
        <button class="carousel-btn next" onclick="nextSlide()">❯</button>
      </div>
    </div> 

  <section class="description">
    <div class="description-container">
      <h2>Selamat Datang di Sistem Informasi Alumni</h2>
      <p>
  SMA 99 Surabaya adalah sekolah menengah atas negeri di Kota Surabaya yang berkomitmen memberikan pendidikan berkualitas. Didukung oleh fasilitas lengkap dan lingkungan belajar yang kondusif, sekolah ini menjadi tempat ideal bagi siswa untuk berkembang secara akademik maupun non-akademik.
</p>
<p>
  Dengan tenaga pengajar profesional dan program unggulan, SMA 99 Surabaya telah melahirkan banyak alumni berprestasi yang tersebar di berbagai perguruan tinggi dan dunia kerja. Para alumni juga aktif menjaga hubungan dengan sekolah melalui berbagai kegiatan dan kontribusi positif untuk kemajuan almamater.
</p>
    </div>
  </section>

    <footer class="footer">
      <p>&copy; 2025 SMA Contoh. All rights reserved.</p>
    </footer>

  </div> 

  <script>
    const slides = document.querySelectorAll('.carousel-slide');
    let currentIndex = 0;

    function showSlide(index) {
      slides.forEach((slide, i) => {
        slide.classList.remove('active');
        if (i === index) {
          slide.classList.add('active');
        }
      });
    }

    function nextSlide() {
      currentIndex = (currentIndex + 1) % slides.length;
      showSlide(currentIndex);
    }

    function prevSlide() {
      currentIndex = (currentIndex - 1 + slides.length) % slides.length;
      showSlide(currentIndex);
    }

    setInterval(nextSlide, 5000);
  </script>

</body>
</html>
