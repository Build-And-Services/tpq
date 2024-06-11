<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil TPQ Al-Hikmah</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* CSS styling */
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
        }

        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .grid-item {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .grid-item img {
            width: 100%;
            height: auto;
            display: block;
        }

        .grid-item .description {
            padding: 15px;
            text-align: justify;
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
        <header>
            <div class="header-content">
                <div class="logo-container">
                    <img src="Picture/logo_tpq.png" alt="Logo TPQ">
                    <h1>TPQ Al-Hikmah Universitas Jember</h1>
                </div>
                <nav>
                    <a href="beranda_santri.php">Beranda</a>
                    <a href="kelas_santri.php">Kelas</a>
                    <a href="kegiatan_santri.php">Kegiatan</a>
                    <div class="profile-menu">
                        <a href="#" onclick="toggleProfileDropdown()"><i class="fas fa-user"></i></a>
                        <div class="profile-menu-content" id="profileDropdown">
                            <a href="profil_santri.php">Lihat Profil</a>
                            <a href="../landing/beranda_landing.php" onclick="logout()">Logout</a>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
    </div>
    <section class="container">
        <div class="content">
            <h2>Kegiatan TPQ Al-Hikmah</h2>
            <div class="grid-container">
                <div class="grid-item">
                    <img src="Picture/launching.jpeg" alt="Kegiatan 1">
                    <div class="description">
                        <p>Launching Taman Pendidikan Al-Qur'an (TPQ) Al-Hikmah Universitas Jember</p>
                    </div>
                </div>
                <div class="grid-item">
                    <img src="Picture/Pembelajaran-akhwat.jpeg" alt="Kegiatan 2">
                    <div class="description">
                        <p>Dokumentasi Kegiatan Pembelajaran Akhwat TPQ AL-HIKMAH Universitas Jember</p>
                    </div>
                </div>
                <div class="grid-item">
                    <img src="Picture/Pembelajaran-ikhwan.jpeg" alt="Kegiatan 3">
                    <div class="description">
                        <p>Dokumentasi Kegiatan Pembelajaran Ikhwan TPQ AL-HIKMAH Universitas Jember</p>
                    </div>
                </div>
                <div class="grid-item">
                    <img src="Picture/Munaqasyah-akhwat.jpeg" alt="Kegiatan 4">
                    <div class="description">
                        <p>Dokumentasi Kegiatan Munaqasyah Akhwat TPQ AL-HIKMAH Universitas Jember</p>
                    </div>
                </div>
                <div class="grid-item">
                    <img src="Picture/Munaqasyah_ikhwan.jpeg" alt="Kegiatan 4">
                    <div class="description">
                        <p>Dokumentasi Kegiatan Munaqasyah Ikhwan TPQ AL-HIKMAH Universitas Jember</p>
                    </div>
                </div>
                <!-- Tambahkan kegiatan lainnya sesuai kebutuhan -->
            </div>
        </div>
    </section>
    <footer>
            <p>Hak Cipta &copy; 2024 - TPQ Al-Hikmah</p>
        </footer>
    </body>
    <script>
        // JavaScript untuk menampilkan/menyembunyikan dropdown profil
        function toggleProfileDropdown() {
            var dropdown = document.getElementById("profileDropdown");
            if (dropdown.style.display === "block") {
                dropdown.style.display = "none";
            } else {
                dropdown.style.display = "block";
            }
        }
    </script>
</html>
