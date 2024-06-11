<?php
$title = 'Penilaian';
ob_start();
?>
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
    <div class="container">
        <div class="content">
            <div class="flex justify-between">
                <h2>Penilaian Santri</h2>
                <a class="bg-[#4CAF50] rounded text-white px-3 py-2 hover:bg-green-500" href="/penilaian/create">Tambah Penilaian</a>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Nama Santri</th>
                        <th>Halaman Klasikal</th>
                        <th>Halaman Baca Simak</th>
                        <th>Penilaian</th>
                        <th>Tanggal Penilaian</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    <?php foreach ($penilaian as $key => $item) : ?>
                        <tr class="dataRow">
                            <td><?= $item->name; ?></td>
                            <td><?= $item->halaman_klasikal !== null ? $item->halaman_klasikal : '-'; ?></td>
                            <td><?= $item->halaman_baca !== null ? $item->halaman_baca : '-'; ?></td>
                            <td><?= $item->kriteria !== null ? $item->kriteria : '-'; ?></td>
                            <td><?= $item->tanggal !== null ? $item->tanggal : '-'; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
       $(document).ready(function() {
    // Sembunyikan baris yang semua nilainya adalah null
    $('.dataRow').each(function() {
        var allNull = true;
        $(this).find('td').not(':first-child').each(function() {
            if ($(this).text() !== '-') {
                allNull = false;
                return false; // Keluar dari loop saat ditemukan nilai yang tidak null
            }
        });
        if (allNull) {
            $(this).hide();
        }
    });
});


    </script>
<?php
$content = ob_get_clean();
include(__DIR__ . '/../../../layouts/index.php');
// include "layouts/index.php";
?>
