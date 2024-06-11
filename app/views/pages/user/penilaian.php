<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penilaian Santri</title>
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
            margin: 90px auto 20px; /* Menambahkan margin top agar konten tidak tertutup oleh header */
            padding: 0 20px;
        }

        .content {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            width: 100%;
            bottom: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #444;
            color: #fff;
        }

        tr:hover {
            background-color: #f2f2f2;
        }

        .button {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 5px;
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
                    <a href="beranda_asatidz.php">Beranda</a>
                    <a href="kelas_asatidz.php">Kelas</a>
                    <a href="kegiatan_asatidz.php">Kegiatan</a>
                    <div class="profile-menu">
                        <a href="#" onclick="toggleProfileDropdown()"><i class="fas fa-user"></i></a>
                        <div class="profile-menu-content" id="profileDropdown">
                            <a href="profil.php">Lihat Profil</a>
                            <a href="#">Logout</a>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
    </div>
    <div class="container">
        <div class="content">
            <h2>Penilaian Santri</h2>
            <table>
                <thead>
                    <tr>
                        <th>Nama Santri</th>
                        <th>Kehadiran</th>
                        <th>Halaman Klasikal</th>
                        <th>Halaman Baca Simak</th>
                        <th>Penilaian</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Fulan</td>
                        <td>
                            <input type="checkbox" id="santri1" name="santri1">
                        </td>
                        <td><form action=""><input type="text" placeholder="Masukkan halaman"></form></td>
                        <td><form action=""><input type="text" placeholder="Masukkan halaman"></form></td>
                        <td>
                            <select name="penilaian_santri1" id="penilaian_santri1">
                                <option value="Baik">Baik</option>
                                <option value="Cukup">Cukup</option>
                                <option value="Kurang">Kurang</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Fulanah</td>
                        <td>
                            <input type="checkbox" id="santri1" name="santri1">
                        </td>
                        <td><form action=""><input type="text" placeholder="Masukkan halaman"></form></td>
                        <td><form action=""><input type="text" placeholder="Masukkan halaman"></form></td>
                        <td>
                            <select name="penilaian_santri2" id="penilaian_santri2">
                                <option value="Baik">Baik</option>
                                <option value="Cukup">Cukup</option>
                                <option value="Kurang">Kurang</option>
                            </select>
                        </td>
                    </tr>
                    <!-- Tambahkan lebih banyak santri sesuai kebutuhan -->
                </tbody>
            </table>
            <button class="button" onclick="submitPenilaian()">Submit</button>
        </div>
    </div>
    <footer>
        <p>Hak Cipta &copy; 2024 Kelas TPQ Al-Falah</p>
    </footer>
    <script>
    // Function to submit penilaian
    function submitPenilaian() {
        // Mendapatkan nilai penilaian dari setiap select
        var penilaianSantri1 = document.getElementById("penilaian_santri1").value;
        var penilaianSantri2 = document.getElementById("penilaian_santri2").value;
        // Menampilkan nilai penilaian (untuk keperluan debug)
        console.log("Penilaian Santri 1: " + penilaianSantri1);
        console.log("Penilaian Santri 2: " + penilaianSantri2);
        // Mengirim data penilaian ke backend (bisa menggunakan AJAX atau form submission, disesuaikan dengan kebutuhan)
        // Contoh menggunakan AJAX
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "backend_process.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Handle response dari server jika diperlukan
                alert(xhr.responseText); // Contoh: Menampilkan pesan dari server
            }
        };
        // Kirim data penilaian ke backend
        xhr.send("penilaian_santri1=" + penilaianSantri1 + "&penilaian_santri2=" + penilaianSantri2);
    }
</script>
</body>
</html>
