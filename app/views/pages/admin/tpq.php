<?php
// Data santri (bisa diambil dari database atau sumber lainnya)
$santri_data = [
    ["id" => 1, "nama" => "Santri 1", "jenis_kelamin" => "Laki-laki", "tanggal_lahir" => "2005-01-01", "bukti_pembayaran" => "bukti1.jpg"],
    ["id" => 2, "nama" => "Santri 2", "jenis_kelamin" => "Perempuan", "tanggal_lahir" => "2006-02-01", "bukti_pembayaran" => "bukti2.jpg"],
    ["id" => 3, "nama" => "Santri 3", "jenis_kelamin" => "Laki-laki", "tanggal_lahir" => "2007-03-01", "bukti_pembayaran" => "bukti3.jpg"],
];

function generateTableRows($data) {
    foreach ($data as $item) {
        echo "<tr>";
        foreach ($item as $key => $value) {
            if ($key !== 'id') {
                echo "<td>".$value."</td>";
            }
        }
        echo "<td><button onclick=\"detailSantri(".$item['id'].")\">Detail</button> <button onclick=\"editSantri(".$item['id'].")\">Ubah</button> <button onclick=\"hapusSantri(".$item['id'].")\">Hapus</button></td>";
        echo "</tr>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda Kelas TPQ</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
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
                    <a href="beranda_admin.php">Beranda</a>
                    <a href="kelas_admin.php">Kelas</a>
                    <a href="kegiatan_admin.php">Kegiatan</a>
                    <a href="data_tpq.php">Data TPQ</a>
                    <div class="profile-menu">
                        <a href="#" onclick="toggleProfileDropdown()"><i class="fas fa-user"></i></a>
                        <div class="profile-menu-content" id="profileDropdown">
                        <a href="../admin/login_admin.php">Logout</a>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
    </div>
    <section class="container">
        <h1>Data Santri</h1>
        <table>
            <tr>
                <th>Nama Lengkap</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Lahir</th>
                <th>Bukti Pembayaran</th>
                <th>Aksi</th>
            </tr>
            <?php generateTableRows($santri_data); ?>
        </table>

        <h1>Data Asatidz</h1>
        <table>
            <tr>
                <th>Nama Lengkap</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Lahir</th>
                <th>Bukti Ketersediaan Mengajar</th>
                <th>Aksi</th>
            </tr>
            <?php
            // Data asatidz (bisa diambil dari database atau sumber lainnya)
            $asatidz_data = [
                ["nama" => "Asatidz 1", "jenis_kelamin" => "Laki-laki", "tgl_lahir" => "2005-01-01", "bukti_ketersedian" => "bukti.jpg" ],
                ["nama" => "Asatidz 2", "jenis_kelamin" => "Laki-laki", "tgl_lahir" => "2005-01-01", "bukti_ketersedian" => "bukti.jpg" ],
                ["nama" => "Asatidz 3", "jenis_kelamin" => "Laki-laki", "tgl_lahir" => "2005-01-01", "bukti_ketersedian" => "bukti.jpg" ],
            ];

            generateTableRows($asatidz_data);
            ?>
        </table>
    </section>
    <footer>
        <p>Hak Cipta &copy; 2024 - TPQ Al-Hikmah</p>
    </footer>

    <script>
        // Fungsi untuk menampilkan detail santri
        function detailSantri(id) {
            alert('Detail santri dengan ID: ' + id);
            // Implementasi detail santri bisa diarahkan ke halaman detail atau modal
        }

        // Fungsi untuk mengubah data santri
        function editSantri(id) {
            alert('Edit santri dengan ID: ' + id);
            // Implementasi edit santri bisa diarahkan ke halaman edit atau modal
        }

        // Fungsi untuk menghapus data santri
        function hapusSantri(id) {
            if (confirm('Apakah Anda yakin ingin menghapus santri dengan ID: ' + id + '?')) {
                alert('Santri dengan ID: ' + id + ' telah dihapus.');
                // Implementasi penghapusan santri bisa dilakukan dengan mengirimkan request ke server untuk menghapus data
            }
        }

        // Fungsi untuk logout
        function logout() {
            // Implementasi logout disini, misalnya mengarahkan pengguna ke halaman logout atau menghapus sesi login
            // Contoh: window.location.href = "logout.php";
            alert("Anda telah berhasil logout"); // Ini hanya contoh, gantilah dengan implementasi sesuai kebutuhan sistem Anda
        }

        // Fungsi untuk menampilkan dropdown profil
        function toggleProfileDropdown() {
            var dropdown = document.getElementById("profileDropdown");
            if (dropdown.style.display === "block") {
                dropdown.style.display = "none";
            } else {
                dropdown.style.display = "block";
            }
        }
    </script>
</body>
</html>
