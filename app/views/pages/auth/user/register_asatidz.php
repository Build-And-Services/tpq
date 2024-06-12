<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Asatidz</title>
    <style>
        /* CSS styling */
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
            padding: 20px;
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

        .right-column {
            display: flex;
            flex-direction: column;
        }

        .right-column input[type="checkbox"],
        .right-column textarea,
        .right-column label {
            margin-bottom: 10px;
        }

        .submit-section {
            text-align: center;
        }

        .submit-section input[type="submit"] {
            background-color: #4caf50;
            color: white;
            border: none;
            cursor: pointer;
            padding: 10px 20px;
            border-radius: 4px;
        }

        .submit-section input[type="submit"]:hover {
            background-color: #45a049;
        }

        .login-link {
            text-align: center;
            margin-top: 20px;
        }

        .login-link a {
            color: #4caf50;
            text-decoration: none;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        .checkbok-kategori {
            display: flex;
            justify-content: space-between;
        }

        .label_category {
            width: 300px;
        }
    </style>
</head>

<body>
    <form class="container" action="/signup-asatidz" method="POST" enctype="multipart/form-data">
        <div>
            <h2>Registrasi Asatidz</h2>
            <div>
                <input type="text" name="nama_asatidz" placeholder="Nama Lengkap" required>
                <input type="date" name="tgl_lahir" placeholder="Tanggal Lahir" required>
                <select name="jenis_kelamin" required>
                    <option value="" disabled selected>Pilih Jenis Kelamin</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
                <input type="text" name="alamat" placeholder="Alamat Lengkap" required>
                <input type="text" name="instansi" placeholder="Asal Instansi" required>
                <input type="text" max="12" name="no_telepon" placeholder="Nomor Telepon" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
            </div>
        </div>
        <div class="right-column">
            <h2>Pilihan Kategori</h2>
            <div>
                <div class="checkbok-kategori">
                    <label for="ketersedia_mengajar" class="label_category">Anak-anak</label>
                    <input type="radio" name="id_kategori" value="1">
                </div>
                <div class="checkbok-kategori">
                    <label for="ketersedia_mengajar" class="label_category">Remaja</label>
                    <input type="radio" name="id_kategori" value="2">
                </div>
                <div class="checkbok-kategori">
                    <label for="ketersedia_mengajar" class="label_category">Dewasa</label>
                    <input type="radio" name="id_kategori" value="3">
                </div>
                <div class="checkbok-kategori">

                    <label for="motivasi">Motivasi Mengajar:</label>
                    <textarea name="motivasi" id="motivasi" rows="4" required></textarea>
                </div>
                <label for="ketersedia_mengajar">Unggah Bukti Ketersediaan Mengajar:</label>
                <input type="text" placeholder="Link Gdrive" name="ketersedia_mengajar" style="margin-top: 10px;" required>
                <label for="syahadah_tilawati">Unggah Bukti Syahadah Tilawati:</label>
                <input type="text" placeholder="Link Gdrive" name="syahadah_tilawati" style="margin-top: 10px;" required>
                <div class="submit-section">
                    <input type="submit" value="Daftar">
                </div>
            </div>

        </div>
        <div class="login-link">
            <p>Sudah punya akun? <a href="/loginasatidz" data-route="/loginasatidz">Login disini</a></p>
        </div>
    </form>
</body>

</html>