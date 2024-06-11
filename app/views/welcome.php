<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda Kelas TPQ</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- <link rel="stylesheet" href="css/style_beranda_santri.css"> -->
    <style>
        /* Tambahkan CSS styling dari kode sebelumnya */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #4CAF50;
            padding: 10px 0;
            text-align: center;
        }

        .header-utama {
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            background-color: #4CAF50;
        }

        .header-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px;
        }

        .header-content .logo-container {
            display: flex;
            align-items: center;
        }

        .header-content h1 {
            color: white;
            font-size: 20px;
            margin: 0;
        }

        .header-content img {
            margin-right: 10px;
            width: 60px;
        }

        nav {
            display: flex;
            justify-content: flex-end;
            position: relative;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            transition: color 0.3s;
        }

        nav a:hover {
            color: yellow;
        }

        nav a:active {
            color: red;
        }

        .profile-menu {
            position: relative;
            display: inline-block;
            margin-top: 10px;
        }

        .profile-menu-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 110px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            right: -10px;
            top: 30px;
            border-radius: 5px;
            padding: 10px 0;
        }

        .profile-menu-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            transition: background-color 0.3s;
        }

        .profile-menu-content a:hover {
            background-color: #ddd;
        }

        .profile-menu:hover .profile-menu-content {
            display: block;
        }

        .container {
            max-width: 1000px;
            margin: 90px auto 20px;
            padding: 0 20px;
        }

        .content {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: flex-start;
            margin-bottom: 20px;
        }

        .text {
            flex: 1;
            margin-right: 20px;
            text-align: justify;
        }

        .image {
            flex: 0 0 40%;
            text-align: center;
        }

        .image img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
        }

        .more-content {
            display: none;
        }

        .show-more {
            color: #4CAF50;
            cursor: pointer;
        }

        .show-more:hover {
            text-decoration: underline;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            width: 100%;
            bottom: 0;
        }
    </style>
</head>
<body>
    <div class="header-utama">
        <div class="header-content">
            <div class="logo-container">
                <img src="<?php echo BASE_URL; ?>/images/logo_tpq.png" alt="Logo TPQ">
                <!-- <img src="Picture/logo_tpq.png" alt="Logo TPQ"> -->
                <h1>TPQ Al-Hikmah Universitas Jember</h1>
            </div>
            <nav>
                <div class="profile-menu">
                    <a href="/login" class="menu-link"><i class="fas fa-user"></i> Masuk ke Akun</a>
                </div>
            </nav>
        </div>
    </div>
    <section class="container">
        <div class="content">
            <div class="text">
                <h2>TPQ AL-HIKMAH UNIVERSITAS JEMBER</h2>
                <p id="short-text">Taman Pendidikan Al-Qur'an Al-Hikmah Universitas Jember, yang berdiri pada tanggal 5 September 2023 di Masjid Al-Hikmah Universitas Jember, merupakan sebuah lembaga pendidikan yang berkomitmen untuk menjaga dan melestarikan warisan agung Al-Qur'an sebagai pedoman hidup umat Muslim, dengan mengutamakan pembelajaran Al-Qur'an dan Pendidikan Agama Islam melalui metode tilawati yang efektif dan sistematis.</p>
                <span id="more-content" class="more-content">
                    Dimana para siswa tidak hanya diajarkan cara membaca Al-Qur'an dengan fasih dan benar sesuai kaidah tajwid, tetapi juga dibekali dengan pemahaman yang mendalam tentang makna dan kandungan Al-Qur'an serta ajaran-ajaran Islam lainnya, sehingga mereka dapat menghayati dan mengamalkannya dalam kehidupan sehari-hari, dengan harapan dapat membentuk generasi muda yang tidak hanya cerdas secara intelektual, tetapi juga memiliki akhlak dan kepribadian yang mulia, serta menjadi insan yang bertakwa kepada Allah Subhanahu Wa Ta'ala dan bermanfaat bagi sesama, agama, bangsa, dan negara. Selain itu, TPQ Al-Hikmah Universitas Jember juga berupaya untuk mencetak kader-kader da'i yang tangguh dan berkomitmen untuk menyebarkan risalah Islam kepada seluruh lapisan masyarakat, dengan menanamkan jiwa kepemimpinan dan kemampuan public speaking sejak dini kepada para siswa, sehari-hari, dengan harapan dapat membentuk generasi muda yang tidak hanya cerdas secara intelektual, tetapi juga memiliki akhlak dan kepribadian yang mulia, serta menjadi insan yang bertakwa kepada Allah Subhanahu Wa Ta'ala dan bermanfaat bagi sesama, agama, bangsa, dan negara. Selain itu, TPQ Al-Hikmah Universitas Jember juga berupaya untuk mencetak kader-kader da'i yang tangguh dan berkomitmen untuk menyebarkan risalah Islam kepada seluruh lapisan masyarakat, dengan menanamkan jiwa kepemimpinan dan kemampuan public speaking sejak dini kepada para siswa, sehingga mereka dapat tumbuh menjadi pribadi yang percaya diri, berani, dan mampu mengomunikasikan nilai-nilai keislaman dengan baik kepada orang lain.
                </span>
                <span id="show-more" class="show-more">Selengkapnya</span>
            </div>
            <div class="image">
                <img src="<?php echo BASE_URL; ?>/images/logo_tpq.png" alt="Logo TPQ">
            </div>
        </div>
        <div class="content">
            <div class="text">
                <h2>MASJID AL-HIKMAH UNIVERSITAS JEMBER</h2>
                <p id="short-text">Masjid Al-Hikmah Universitas Jember merupakan oase spiritual yang menjadi pusat kegiatan keagamaan dan keislaman bagi sivitas akademika Universitas Jember. Didirikan pada tahun 2019, masjid ini telah menjadi landmark penting di kampus, mencerminkan komitmen universitas terhadap nilai-nilai Islam dan pengembangan karakter mahasiswa yang berakhlak mulia.</p>
                <span id="more-content" class="more-content">
                Masjid Al-Hikmah memiliki desain arsitektur modern yang menawan, menggabungkan unsur tradisional dan kontemporer. Dinding masjid terbuat dari batu bata dengan aksen kaligrafi indah yang menghiasi bagian atasnya. Kubah masjid yang megah menjulang tinggi, menjadi simbol kemegahan dan keagungan Islam. Masjid Al-Hikmah memiliki ruang salat utama yang luas dan nyaman, mampu menampung hingga 3000 jamaah. Interior masjid didesain dengan warna-warna cerah dan pencahayaan yang memadai, menciptakan suasana yang tenang dan kondusif untuk beribadah. Masjid Al-Hikmah tidak hanya menjadi tempat ibadah, tetapi juga pusat pembinaan karakter bagi mahasiswa Universitas Jember. Di masjid ini, mahasiswa didorong untuk meningkatkan keimanan, ketakwaan, dan akhlak mulia. Berbagai kegiatan dan program yang diselenggarakan di masjid ini bertujuan untuk membentuk mahasiswa yang berkarakter Islami yang siap menjadi pemimpin bangsa yang beriman dan berakhlak mulia. Masjid Al-Hikmah menjadi simbol keharmonisan dan kebersamaan di Universitas Jember. Masjid ini menjadi tempat berkumpulnya sivitas akademika dari berbagai fakultas dan jurusan, mempersatukan mereka dalam keimanan dan ketaatan kepada Allah SWT. Masjid Al-Hikmah merupakan bukti nyata komitmen Universitas Jember untuk membangun generasi muda yang berakhlak mulia dan siap berkontribusi bagi kemajuan bangsa.
                </span>
                <span id="show-more" class="show-more">Selengkapnya</span>
            </div>
            <div class="image">
                <img src="<?php echo BASE_URL; ?>/images/masjid1.png" alt="Masjid">
            </div>
        </div>
    </section>
    <footer>
        <p>Hak Cipta &copy; 2024 - TPQ Al-Hikmah</p>
    </footer>

    <script>
        document.querySelectorAll('.show-more').forEach(function(btn) {
            btn.addEventListener('click', function() {
                var moreContent = this.previousElementSibling;
                if (moreContent.style.display === 'none' || moreContent.style.display === '') {
                    moreContent.style.display = 'inline';
                    this.textContent = 'Lebih Sedikit';
                } else {
                    moreContent.style.display = 'none';
                    this.textContent = 'Selengkapnya';
                }
            });
        });
    </script>
</body>
</html>
