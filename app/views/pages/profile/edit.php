<?php
$title = 'Edit Profile';
ob_start();
?>

<style>
        /* CSS styling */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
            /* Set background image */
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
<div class="w-full flex-grow-1 mb-96 md:mb-[500px] flex justify-center my-10">
    <div class="container max-w-3xl bg-white border p-5 rounded-md">
        <h1 class="font-semibold text-xl">Profile <?= $role ?></h1>
        
        <div class="flex items-center gap-2">
            <h2>Update User Profile</h2>
            <a href="/profile" class="bg-green-500 hover:bg-green-600 px-8 py-2 rounded-md text-white font-semibold block w-fit">Kembali</a>
        </div>

        <form action="/profile/update/<?= $profile->id_user ?>" method="POST">
            <div class="mt-5">
                <p>
                    <span class="font-semibold mr-5">Nama Lengkap</span>
                    <input type="text" id="email" name="name" value="<?= $profile->name ?>">
                </p>
                <p>
                    <span class="font-semibold mr-5">Jenis Kelamin</span>
                    <select name="jenis_kelamin" required>
                        <option value="" disabled selected>Pilih Jenis Kelamin</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </p>
                <p>
                    <span class="font-semibold mr-5">Tanggal Lahir</span>
                    <input type="date" id="tgl_lahir" name="tgl_lahir" value="<?php if(isset($profile->tgl_lahir)): ?>
                        <?= $profile->tgl_lahir ?>
                    <?php endif; ?>">
                </p>

                <p>
                    <span class="font-semibold mr-5">Alamat Lengkap</span>
                    <input type="text" id="email" name="alamat" value="<?php if(isset($profile->alamat)): ?>
                        <?= $profile->alamat ?>
                    <?php endif; ?>">
                </p>
                <p>
                    <span class="font-semibold mr-5">Kategori</span>
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
                </p>

                <p>
                    <span class="font-semibold mr-5">Email</span>
                    <input type="email" id="email" name="email" value="<?php if(isset($profile->email)): ?>
                        <?= $profile->email ?>
                    <?php endif; ?>">
                </p>
            </div>
            <button class="bg-green-500 hover:bg-green-600 rounded-lg text-white px-4 py-2" type="submit" value="Submit">Submit</button>
        </form>
    </div>
</div>


<?php
$content = ob_get_clean();
include  __DIR__ .'/../../layouts/index.php';
?>