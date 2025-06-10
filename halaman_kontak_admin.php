<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Halaman Kontak</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .testimonial-carousel {
            position: relative;
            display: flex;
            justify-content: center;
            width: 100%;
            overflow: hidden;
            margin-top: 30px;
            align-items: center;
        }

        .testimonial-cards {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            position: relative;
        }

        .testimonial-card-group {
            display: flex;
            gap: 20px;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.5s ease;
            position: absolute;
            width: 100%;
        }

        .testimonial-card-group.active {
            opacity: 1;
            z-index: 1;
            position: relative;
        }

        .testimonial-card {
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.08);
            padding: 20px 30px;
            max-width: 350px;
            min-height: 110px;
            text-align: center;
            font-style: italic;
            color: #333;
            flex: 1;
        }

        .kontak-page .contact-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 50px;
            max-width: 1000px;
            margin: 100px auto 60px auto;
            padding: 20px;
            background-color: #fffaf0;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .kontak-page .contact-form {
            flex: 1;
            min-width: 300px;
            max-width: 500px;
            background-color: #fff8dc;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .kontak-page .contact-form input,
        .kontak-page .contact-form textarea,
        .kontak-page .contact-form select {
            padding: 12px;
            font-size: 15px;
            border-radius: 8px;
            border: 1px solid #c0a16b;
            background-color: #fffef6;
            font-family: "Trebuchet MS", sans-serif;
            box-shadow: inset 0 1px 2px rgba(0,0,0,0.05);
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        .kontak-page .contact-form input:focus,
        .kontak-page .contact-form textarea:focus,
        .kontak-page .contact-form select:focus {
            border-color: #8B4513;
            box-shadow: 0 0 5px rgba(139, 69, 19, 0.4);
            outline: none;
        }

        .kontak-page .contact-form textarea {
            min-height: 120px;
            resize: vertical;
        }

        .kontak-page .contact-form button {
            background-color: #8B4513;
            color: white;
            padding: 12px 20px;
            font-size: 16px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            align-self: flex-end;
            transition: background-color 0.3s, transform 0.2s;
        }

        .kontak-page .contact-form button:hover {
            background-color: #A0522D;
            transform: translateY(-2px);
        }

        .kontak-page .contact-info {
            flex: 1;
            min-width: 250px;
            max-width: 400px;
            background-color: #fef5e6;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            font-size: 15px;
            line-height: 1.8;
        }

        .kontak-page .contact-info h4 {
            font-size: 18px;
            margin-bottom: 10px;
            color: #8B4513;
        }

        .kontak-page .contact-info p {
            margin: 0 0 10px 0;
        }

        @media screen and (max-width: 500px) {
            .kontak-page .contact-container {
                flex-direction: column;
                gap: 30px;
            }

            .testimonial-card-group {
                flex-direction: column;
                align-items: center;
            }

            .testimonial-card {
                max-width: 90%;
            }

            .kontak-page .contact-form,
            .kontak-page .contact-info {
                max-width: 100%;
            }

            .kontak-page .contact-form button {
                width: 100%;
                align-self: stretch;
            }
        }
    </style>
</head>
<body class="kontak-page">

<div class="navbar">
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
</div>

<div class="testimonials-section">
    <h2 class="testimonial-title" style="text-align: center;">TESTIMONIALS</h2>
    <p class="testimonial-subtitle" style="text-align: center;">
        Kisah nyata para alumni SMA 99 Surabaya yang membuktikan bahwa pendidikan, nilai, dan semangat dari sekolah ini terus hidup dalam langkah mereka.
        Melalui testimoni ini, kita melihat bagaimana kenangan sekolah berubah menjadi fondasi kesuksesan di dunia nyata.
    </p>

    <div class="testimonial-carousel">
        <div class="testimonial-cards">
            <?php
            include 'koneksi.php';
            $query = "SELECT * FROM testimonialumni WHERE tampilkan = 1 ORDER BY idtestimoniAlumni DESC";
            $result = mysqli_query($koneksi, $query);

            $cards = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $cards[] = $row;
            }

            $cardsPerSlide = 2;
            $totalSlides = ceil(count($cards) / $cardsPerSlide);

            for ($i = 0; $i < $totalSlides; $i++) {
                $activeClass = $i === 0 ? 'active' : '';
                echo '<div class="testimonial-card-group ' . $activeClass . '">';
                for ($j = 0; $j < $cardsPerSlide; $j++) {
                    $cardIndex = $i * $cardsPerSlide + $j;
                    if ($cardIndex < count($cards)) {
                        $card = $cards[$cardIndex];
                        echo '<div class="testimonial-card">';
                        echo '<p>"' . htmlspecialchars($card['testimoni']) . '"</p>';
                        echo '<span>— ' . htmlspecialchars($card['nama_depan']) . ', Alumni ' . htmlspecialchars($card['tahunLulus']) . '</span>';
                        echo '</div>';
                    }
                }
                echo '</div>';
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
    const groups = document.querySelectorAll('.testimonial-card-group');
    let currentIndex = 0;

    function updateSlide(index) {
        groups.forEach((group, i) => {
            group.classList.remove('active');
            if (i === index) {
                group.classList.add('active');
            }
        });
    }

    function autoSlide() {
        currentIndex = (currentIndex + 1) % groups.length;
        updateSlide(currentIndex);
    }

    updateSlide(currentIndex);
    setInterval(autoSlide, 4000); 
</script>

</body>
</html>
