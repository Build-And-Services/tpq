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
            background-image: url('Picture/masjid2.jpg');
            /* Atur properti background */
            background-size: cover; /* Menutupi seluruh area body */
            background-repeat: no-repeat; /* Tidak mengulang gambar */
            background-position: center; /* Posisikan gambar di tengah */
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

        .container > * {
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
    </style>
</head>
<body>
    <div class="container">
        <div>
            <h2>Registrasi Asatidz</h2>
            <form action="proses_registrasi_asatidz.php" method="POST" enctype="multipart/form-data">
                <input type="text" name="nama_asatidz" placeholder="Nama Lengkap" required>
                <input type="date" name="tgl_lahir" placeholder="Tanggal Lahir" required>
                <select name="jenis_kelamin" required>
                    <option value="" disabled selected>Pilih Jenis Kelamin</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
                <input type="text" name="alamat" placeholder="Alamat Lengkap" required>
                <input type="text" name="id_kabupaten" placeholder="ID Kabupaten" required>
                <input type="text" name="id_asal_instansi" placeholder="ID Asal Instansi" required>
                <input type="text" name="id_kategori" placeholder="ID Kategori" required>
                <input type="text" name="no_telepon" placeholder="Nomor Telepon" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
            </form>
        </div>
        <div class="right-column">
            <h2>Pilihan Kategori</h2>
            <form action="proses_registrasi_asatidz.php" method="POST" enctype="multipart/form-data">
                <input type="checkbox" name="kategori[]" value="anak-anak"> Anak-anak<br>
                <input type="checkbox" name="kategori[]" value="remaja"> Remaja<br>
                <input type="checkbox" name="kategori[]" value="dewasa"> Dewasa<br>
                <label for="motivasi">Motivasi Mengajar:</label>
                <textarea name="motivasi" id="motivasi" rows="4" required></textarea>
                <label for="ketersedia_mengajar">Unggah Bukti Ketersediaan Mengajar:</label>
                <input type="file" name="ketersedia_mengajar" id="ketersedia_mengajar" accept="image/*" required>
                <label for="syahadah_tilawati">Unggah Bukti Syahadah Tilawati:</label>
                <input type="file" name="syahadah_tilawati" id="syahadah_tilawati" accept="image/*" required>            
                <div class="submit-section">
                <input type="submit" value="Daftar">
                </div>
            </form>

        </div>
        <div class="login-link">
            <p>Sudah punya akun? <a href="login_asatidz.php">Login disini</a></p>
        </div>
    </div>
</body>
</html>
