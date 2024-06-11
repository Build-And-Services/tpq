<?php
// login_santri.php

session_start();

// Pesan kesalahan login
$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Inklusi file koneksi database
    include 'koneksi.php';

    // Ambil data dari form login
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query untuk memeriksa keberadaan santri berdasarkan email dan password
    $query = "SELECT santri_id FROM santri WHERE email = :email AND password = :password";
    $stmt = $pdo->prepare($query);
    $stmt->execute(array(':email' => $email, ':password' => $password));
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Simpan ID santri dalam sesi
        $_SESSION['santri_id'] = $user['santri_id'];
        // Arahkan ke halaman beranda_santri.php
        header('Location: kelas.php');
        exit();
    } else {
        $error_message = "Email atau password salah.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Santri</title>
    <link rel="stylesheet" href="css/style_registrasi_santri.css">
    <style>
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
            width: 400px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
        }

        input[type="email"],
        input[type="password"],
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

        .register-link {
            text-align: center;
            margin-bottom: 15px;
        }

        .register-link a {
            color: #4caf50;
            text-decoration: none;
        }

        .register-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login Admin</h2>
        <?php if ($error_message): ?>
            <p class="message"><?php echo htmlspecialchars($error_message); ?></p>
        <?php endif; ?>
        <form action="login_admin.php" method="POST">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>
