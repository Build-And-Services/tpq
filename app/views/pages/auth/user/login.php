<?php
$title = 'Login';
ob_start();
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<style>
    .container {
        text-align: center;
        display: flex;
        justify-content: center;
        margin-top: 90px;
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

<div class="container mb-36">
    <div class="login-option">
        <img src="<?php echo BASE_URL; ?>/images/santri.png" alt="Logo TPQ" alt="Santri">
        <br>
        <a href="/loginsantri" data-route="/loginsantri" class="login-button">Login Santri</a>
    </div>
    <div class="login-option">
        <img src="<?php echo BASE_URL; ?>/images/asatidz.png" alt="Logo TPQ" alt="Santri">
        <br>
        <a href="/loginasatidz" data-route="/loginasatidz" class="login-button"">Login Asatidz</a>
    </div>
</div>

<?php
$content = ob_get_clean();
include_once __DIR__ . '../../../../layouts/index.php';
?>