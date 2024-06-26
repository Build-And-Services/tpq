<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Santri</title>
    <link rel="stylesheet" href="css/style_registrasi_asatidz.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
            /* Set background image */
            background-image: url("<?php echo BASE_URL; ?>/images/masjid2.jpg");
            /* Atur properti background */
            background-size: cover;
            /* Menutupi seluruh area body */
            background-repeat: no-repeat;
            /* Tidak mengulang gambar */
            background-position: center;
            /* Posisikan gambar di tengah */
        }

        .container {
            width: 80%;
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-wrap: wrap;
        }

        .container>* {
            flex: 1 1 50%;
            /* 50% width for each element, adjust as needed */
            padding: 10px;
            box-sizing: border-box;
        }

        h2 {
            text-align: center;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="date"],
        select,
        input[type="checkbox"],
        input[type="file"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .message {
            text-align: center;
            color: red;
            margin-bottom: 15px;
        }

        .login-link {
            text-align: center;
            margin-bottom: 15px;
        }

        .login-link a {
            color: #4caf50;
            text-decoration: none;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        .kategori {
            margin-top: 60px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div>
            <h2>Registrasi Santri</h2>
            <form action="/signup-santri" method="POST" enctype="multipart/form-data">
                <input type="text" name="name" placeholder="Nama Lengkap" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="text" name="telepon" placeholder="No Telepon" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="date" name="tanggal_lahir" placeholder="Tanggal Lahir" required>
                <select name="jenis_kelamin" name="jenis_kelamin" required>
                    <option value="" disabled selected>Pilih Jenis Kelamin</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
                <input type="text" name="alamat" placeholder="Alamat Lengkap" required>
                <input type="text" name="instansi" placeholder="Asal Instansi" required>
        </div>
        <div class="kategori">
            <p>Pilih kategori:</p>
            <input type="radio" name="kategori" value="1"> Anak-anak<br>
            <input type="radio" name="kategori" value="2"> Remaja<br>
            <input type="radio" name="kategori" value="3"> Dewasa<br>
            <div style="margin-top: 10px;">
                <label for="bukti_pembayaran">Unggah Bukti Pembayaran:</label>
                <input style="margin-top: 10px;" type="text" name="bukti_pembayaran" placeholder="Link Gdrive" required>

            </div>
        </div>
        <div class="container">
            <input type="submit" value="Daftar">
        </div>
        </form>
        <div class="login-link">
            <p>Sudah punya akun? <a href="/loginsantri" data-route="/loginsantri">Login disini</a></p>
        </div>
    </div>
</body>

</html>