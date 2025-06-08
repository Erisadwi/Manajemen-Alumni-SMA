<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin - Halaman Utama</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

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

  <section id="sejarah" class="description-container">
  <h1>Sejarah Sekolah</h1>
  <p>
    Sekolah kami berdiri pada tahun <strong>1985</strong> sebagai respons atas kebutuhan masyarakat akan pendidikan 
    yang berkualitas dan terjangkau di wilayah ini. Didirikan oleh para tokoh pendidikan dan tokoh masyarakat, 
    sekolah ini awalnya hanya memiliki <strong>3 ruang kelas sederhana</strong> dan puluhan siswa.
  </p>
  <p>
    Seiring perkembangan zaman dan meningkatnya kepercayaan masyarakat, sekolah terus berbenah dalam hal fasilitas, 
    kurikulum, dan sumber daya manusia. Pada tahun <strong>1995</strong>, kami mulai membuka program kelas unggulan 
    dan meraih akreditasi B dari Dinas Pendidikan. Lima tahun kemudian, jumlah siswa meningkat pesat hingga mencapai 
    lebih dari <strong>600 siswa</strong>, dan kami berhasil memperoleh <strong>akreditasi A</strong>.
  </p>
  <p>
    Dalam dua dekade terakhir, sekolah ini telah menjadi <strong>salah satu institusi pendidikan terdepan</strong> di kawasan ini. 
    Dengan semangat <em>“Berkarakter, Berprestasi, dan Berwawasan Global”</em>, kami terus meningkatkan mutu pendidikan 
    dengan berbasis teknologi, inovasi, dan pembelajaran aktif.
  </p>
  <section id="visi-misi" class="description-container" style="margin-top: 60px; text-align: center;">
  <h1>Visi dan Misi</h1>
  <div style="margin-top: 40px; display: flex; flex-wrap: wrap; justify-content: center; gap: 20px;">
    <!-- Misi Box 1 -->
    <div style="flex: 1; min-width: 250px; max-width: 300px; background-color: #f9f9f9; padding: 25px; border-radius: 12px; box-shadow: 0 4px 10px rgba(0,0,0,0.08); text-align: center;">
      <i class="fas fa-school fa-2x" style="color: #4A90E2; margin-bottom: 15px;"></i>
      <h3 style="margin-bottom: 10px;">Pendidikan Berkualitas</h3>
      <p>Menyediakan layanan pendidikan unggul yang merata untuk semua lapisan masyarakat.</p>
    </div>

    <!-- Misi Box 2 -->
    <div style="flex: 1; min-width: 250px; max-width: 300px; background-color: #f9f9f9; padding: 25px; border-radius: 12px; box-shadow: 0 4px 10px rgba(0,0,0,0.08); text-align: center;">
      <i class="fas fa-brain fa-2x" style="color: #50C878; margin-bottom: 15px;"></i>
      <h3 style="margin-bottom: 10px;">Pengembangan Potensi</h3>
      <p>Mendorong siswa berkembang dalam bidang akademik dan non-akademik sesuai bakatnya.</p>
    </div>

    <!-- Misi Box 3 -->
    <div style="flex: 1; min-width: 250px; max-width: 300px; background-color: #f9f9f9; padding: 25px; border-radius: 12px; box-shadow: 0 4px 10px rgba(0,0,0,0.08); text-align: center;">
      <i class="fas fa-hands-praying fa-2x" style="color: #FF8C42; margin-bottom: 15px;"></i>
      <h3 style="margin-bottom: 10px;">Karakter & Religius</h3>
      <p>Menanamkan nilai moral, etika, dan keagamaan dalam kehidupan sehari-hari.</p>
    </div>

    <!-- Misi Box 4 -->
    <div style="flex: 1; min-width: 250px; max-width: 300px; background-color: #f9f9f9; padding: 25px; border-radius: 12px; box-shadow: 0 4px 10px rgba(0,0,0,0.08); text-align: center;">
      <i class="fas fa-laptop-code fa-2x" style="color: #7E57C2; margin-bottom: 15px;"></i>
      <h3 style="margin-bottom: 10px;">Pemanfaatan Teknologi</h3>
      <p>Memanfaatkan teknologi informasi untuk pembelajaran aktif dan inovatif.</p>
    </div>

    <!-- Misi Box 5 -->
    <div style="flex: 1; min-width: 250px; max-width: 300px; background-color: #f9f9f9; padding: 25px; border-radius: 12px; box-shadow: 0 4px 10px rgba(0,0,0,0.08); text-align: center;">
      <i class="fas fa-people-arrows fa-2x" style="color: #E94E77; margin-bottom: 15px;"></i>
      <h3 style="margin-bottom: 10px;">Kemitraan & Kolaborasi</h3>
      <p>Menjalin kerja sama dengan orang tua, masyarakat, dan lembaga lain secara aktif.</p>
    </div>
  </div>

</section>

<section id="sambutan" class="description-container">
  <div style="display: flex; flex-wrap: wrap; gap: 20px; align-items: flex-start;">

    <div style="flex: 2; min-width: 250px;">
      <p>Assalamu'alaikum warahmatullahi wabarakatuh,</p>
      <p>
        Puji syukur kita panjatkan ke hadirat Allah SWT atas limpahan rahmat dan karunia-Nya, sehingga kita masih diberi kesempatan untuk terus belajar, berkarya, dan membangun generasi penerus bangsa.
      </p>
      <p>
       Saya merasa bangga dan bersyukur dapat memimpin sekolah yang telah berdiri lebih dari tiga dekade ini. Selama bertahun-tahun, kami telah menjadi bagian penting dalam mencetak generasi muda yang tidak hanya cerdas secara akademik, tetapi juga berakhlak mulia dan siap menghadapi tantangan global.
      </p>
      <p>
        Di era digital dan globalisasi seperti sekarang, kami terus bertransformasi. Kami menerapkan pendekatan pembelajaran yang interaktif, berbasis proyek, serta mengintegrasikan teknologi informasi dalam setiap aspek kegiatan belajar mengajar. Tak hanya itu, penguatan karakter siswa melalui kegiatan ekstrakurikuler, pelatihan kepemimpinan, dan pembiasaan nilai-nilai religius 
    menjadi fokus utama kami.
      </p>
      <p>
         Kami percaya bahwa sekolah bukan hanya tempat belajar, tapi juga tempat tumbuh dan berkembangnya bakat serta potensi siswa. Dengan dukungan guru-guru profesional, staf yang berdedikasi, serta kerja sama yang erat dengan orang tua dan masyarakat, kami optimis dapat menciptakan lulusan yang unggul dalam intelektual, emosional, dan spiritual.
  </p>
      </p>
      <p>
        Wassalamu’alaikum warahmatullahi wabarakatuh.
      </p>
      <p><strong>Drs. H. Ahmad Suparno, M.Pd</strong><br>Kepala Sekolah</p>
    </div>

    <div style="flex: 1; min-width: 200px; text-align: center;">
      <img src= "img/kepalasekolah.jpg" alt="Kepala Sekolah" style="max-width: 100%; border-radius: 12px; box-shadow: 0 4px 10px rgba(0,0,0,0.1);" />
      <p style="margin-top: 10px;"><strong>Drs. H. Ahmad Suparno, M.Pd</strong></p>
    </div>
  </div>
</section>

<section id="fasilitas" class="description-container" style="margin-top: 60px; text-align: center;">
  <h1>Fasilitas Sekolah Terbaik</h1>
  <p style="max-width: 800px; margin: 0 auto; font-size: 18px;">
    Fasilitas untuk mendukung belajar siswa di sekolah kami
  </p>

  <div style="margin-top: 40px; display: flex; flex-wrap: wrap; justify-content: center; gap: 20px;">
    
    <div style="flex: 1; min-width: 220px; max-width: 260px; background-color: #f9f9f9; padding: 20px; border-radius: 12px; box-shadow: 0 4px 10px rgba(0,0,0,0.08); text-align: center;">
      <i class="fas fa-book-reader fa-2x" style="color: #2E7D32; margin-bottom: 15px;"></i>
      <h3>Perpustakaan</h3>
    </div>

    <div style="flex: 1; min-width: 220px; max-width: 260px; background-color: #f9f9f9; padding: 20px; border-radius: 12px; box-shadow: 0 4px 10px rgba(0,0,0,0.08); text-align: center;">
      <i class="fas fa-flask fa-2x" style="color: #2E7D32; margin-bottom: 15px;"></i>
      <h3>Laboratorium Lengkap</h3>
    </div>

    <div style="flex: 1; min-width: 220px; max-width: 260px; background-color: #f9f9f9; padding: 20px; border-radius: 12px; box-shadow: 0 4px 10px rgba(0,0,0,0.08); text-align: center;">
      <i class="fas fa-tv fa-2x" style="color: #2E7D32; margin-bottom: 15px;"></i>
      <h3>Ruang Belajar Multimedia</h3>
    </div>

    <div style="flex: 1; min-width: 220px; max-width: 260px; background-color: #f9f9f9; padding: 20px; border-radius: 12px; box-shadow: 0 4px 10px rgba(0,0,0,0.08); text-align: center;">
      <i class="fas fa-check-circle fa-2x" style="color: #2E7D32; margin-bottom: 15px;"></i>
      <h3>Ruang Kelas</h3>
    </div>

    <div style="flex: 1; min-width: 220px; max-width: 260px; background-color: #f9f9f9; padding: 20px; border-radius: 12px; box-shadow: 0 4px 10px rgba(0,0,0,0.08); text-align: center;">
      <i class="fas fa-book-open fa-2x" style="color: #2E7D32; margin-bottom: 15px;"></i>
      <h3>Pojok Baca</h3>
    </div>

    <div style="flex: 1; min-width: 220px; max-width: 260px; background-color: #f9f9f9; padding: 20px; border-radius: 12px; box-shadow: 0 4px 10px rgba(0,0,0,0.08); text-align: center;">
      <i class="fas fa-store fa-2x" style="color: #2E7D32; margin-bottom: 15px;"></i>
      <h3>Koperasi</h3>
    </div>

    <div style="flex: 1; min-width: 220px; max-width: 260px; background-color: #f9f9f9; padding: 20px; border-radius: 12px; box-shadow: 0 4px 10px rgba(0,0,0,0.08); text-align: center;">
      <i class="fas fa-volleyball-ball fa-2x" style="color: #2E7D32; margin-bottom: 15px;"></i>
      <h3>Lapangan Voli & Basket</h3>
    </div>

    <div style="flex: 1; min-width: 220px; max-width: 260px; background-color: #f9f9f9; padding: 20px; border-radius: 12px; box-shadow: 0 4px 10px rgba(0,0,0,0.08); text-align: center;">
      <i class="fas fa-building fa-2x" style="color: #2E7D32; margin-bottom: 15px;"></i>
      <h3>Ruang Serbaguna</h3>
    </div>

  </div>
</section>
  </div> 

      <footer class="footer">
      <p>&copy; 2025 SMA 99 All rights reserved.</p>
      </footer>

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
