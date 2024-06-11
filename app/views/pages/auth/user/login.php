<?php
$title = 'Login';
ob_start();
?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
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
        }

        .menu-link {
            display: block;
            padding: 10px;
            background-color: white;
            color: #4caf50; /* warna hijau */
            border-radius: 30px;
        }

        .profile-menu-content {
            display: none;
            position: absolute;
            background-color: white;
            min-width: 160px;
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
            z-index: 1;
            border-radius: 30px;
        }

        .profile-menu-content a {
            color: black;
            padding: 10px;
            text-decoration: none;
            display: block;
        }

        .profile-menu-content a:hover {
            background-color: #f1f1f1;
        }

        .container {
            text-align: center;
            display: flex;
            justify-content: center;
            margin-top: 100px;
        }

        .login-option {
            margin: 20px;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .login-option img {
            width: 200px;
            height: auto;
            margin-bottom: 10px;
        }

        .login-button {
            background-color: #4caf50;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-top: 10px;
            border-radius: 4px;
            cursor: pointer;
        }

        .login-button:hover {
            background-color: #45a049;
        }
    </style>

    <div class="container">
        <div class="login-option">
            <img src="Picture/santri.png" alt="Santri">
            <br>
            <a href="#" class="login-button" id="login-santri-button">Login Santri</a>
        </div>
        <div class="login-option">
            <img src="Picture/asatidz.png" alt="Santri">
            <br>
            <a href="#" class="login-button" id="login-asatidz-button">Login Asatidz</a>
        </div>
    </div>

    <div class="container" id="login-santri" style="display:none">
        <h2>Login Santri</h2>
        <?php if (!empty($error_message)): ?>
            <p class="message"><?php echo htmlspecialchars($error_message); ?></p>
        <?php endif; ?>
        <form action="beranda_santri.php" method="POST"> <!-- perubahan disini -->
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="Masuk">
        </form>
        <div class="register-link">
            <p>Belum punya akun? <a href="registrasi_santri.php">Daftar disini</a></p> <!-- perubahan disini -->
        </div>
    </div>
    <div class="container" id="login-santri" style="display:none">
        <h2>Login Asatidz</h2>
        <?php if (!empty($error_message)): ?>
            <p class="message"><?php echo htmlspecialchars($error_message); ?></p>
        <?php endif; ?>
        <form action="beranda_asatidz.php" method="POST"> <!-- perubahan disini -->
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="Masuk">
        </form>
        <div class="register-link">
            <p>Belum punya akun? <a href="registrasi_asatidz.php">Daftar disini</a></p> <!-- perubahan disini -->
        </div>
    </div>
    <script>
        document.getElementById('login-santri-button').addEventListener('click', function() {
            document.getElementById('login-santri').style.display = 'block';
            document.getElementById('login-asatidz').style.display = 'none';
        });

        document.getElementById('login-asatidz-button').addEventListener('click', function() {
            document.getElementById('login-santri').style.display = 'none';
            document.getElementById('login-asatidz').style.display = 'block';
        });
    </script>
<?php
$content = ob_get_clean();
include '../../../layouts/guest.php';
?>
