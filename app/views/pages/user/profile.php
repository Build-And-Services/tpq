<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Santri</title>
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
            max-width: 800px;
            margin: 90px auto 20px;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .profile-info {
            margin-bottom: 20px;
        }

        .profile-info h2 {
            color: #333;
            margin-bottom: 10px;
        }

        .profile-info p {
            margin: 5px 0;
        }

        .ubah-profil {
            color: white;
            text-decoration: none;
            display: inline-block;
            padding: 10px 25px;
            background-color: #4CAF50;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .ubah-profil:hover {
            background-color: #45a049;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            width: 100%;
            bottom: 0;
            position: fixed;
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
    <div class="container">
    <div class="profile-info">
        <h2>Profil Santri</h2>
        <p><strong>Nama Lengkap:</strong> John Doe</p>
        <p><strong>Jenis Kelamin:</strong> Laki-laki</p>
        <p><strong>Tanggal Lahir:</strong> 10 Januari 2005</p>
        <p><strong>Alamat Lengkap:</strong> Jl. Raya No. 123, Kota ABC</p>
        <p><strong>Kategori:</strong> Dewasa</p>
        <p><strong>Email :</strong> john@gmail.com</p>
        <!-- Tambahkan informasi lainnya sesuai kebutuhan -->
        <button><a href="#" class="ubah-profil" onclick="openLoginPopup('ubah_profil_santri.php')">Ubah</a></button>
    </div>
</div>
    <footer>
        <p>Hak Cipta &copy; 2024 - TPQ Al-Hikmah</p>
    </footer>
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
    function editProfile() {
        window.location.href = 'ubah_profil_santri.php';
    }
    function openLoginPopup(url) {
    var width = 600;
    var height = 400;
    var left = (screen.width / 2) - (width / 2);
    var top = (screen.height / 2) - (height / 2);
    var options = 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=' + width + ', height=' + height + ', top=' + top + ', left=' + left;
    window.open(url, 'Login Santri', options);
}
    </script>
</body>
</html>