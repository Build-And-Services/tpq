<?php

namespace app\controllers;

require_once '../core/Autoloader.php';

use app\models\Santri;
use PDOException;
use app\models\User;
use core\Controller;

class AuthController extends Controller
{
    public function index()
    {
        if ($this->isAuthenticated()) {
            header('Location: /page');
            exit();
        }
        $this->view('landing');
    }

    public function pageView()
    {
        if (!$this->isAuthenticated()) {
            header('Location: /');
            exit();
        }
        $this->view('pages/user/dashboard');
    }

    public function pageLogin()
    {
        $this->view('pages/auth/user/login');
    }

    public function viewLoginAdmin()
    {
        $this->view('pages/auth/admin/login');
    }
    public function viewLoginSantri()
    {
        $this->view('pages/auth/user/loginsantri');
    }

    public function viewLoginAsatidz()
    {
        $this->view('pages/auth/user/loginasatidz');
    }

    public function viewRegisterSantri()
    {
        $this->view('pages/auth/user/register_santri');
    }

    public function viewRegisterAsatidz()
    {
        $this->view('pages/auth/user/register_asatidz');
    }

    public function registerAsatidz(){
        var_dump($this->request->all());
        die;
    }

    public function registerSantri()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $telepon = $_POST['telepon'];
            $tanggal_lahir = $_POST['tanggal_lahir'];
            $jenis_kelamin = $_POST['jenis_kelamin'];
            $alamat = $_POST['alamat'];
            $instansi = $_POST['instansi'];
            $kategori = $_POST['kategori'];
            if ($_FILES['bukti_pembayaran']) {
                $targetDir = $_SERVER['DOCUMENT_ROOT'] . "/images/bukti_pembayaran/"; // Direktori tujuan penyimpanan
                $targetFile = $targetDir . basename($_FILES["bukti_pembayaran"]["name"]);
                $upload = move_uploaded_file($_FILES["bukti_pembayaran"]["tmp_name"], $targetFile);
                if ($upload) {
                    $_POST["bukti_pembayaran"]  = "/images/bukti_pembayaran/" . basename($_FILES["bukti_pembayaran"]["name"]);
                }
            }

            $hashed_password = password_hash($password, PASSWORD_BCRYPT);

            $user = new User();
            $id_user = $user->insertGetId([
                'name' => $name,
                'email' => $email,
                'password' => $hashed_password,
                'role' => 'santri',
                'status' => 'WAITING'
            ]);

            $id_instansi = 0;

            $santri = new Santri();
            if ($instansi == 'Politeknik Jember') {
                $id_instansi = 1;
            } else {
                $id_instansi = 2;
            }
            $santri->create([
                'id_user' => $id_user,
                'tgl_lahir' => $tanggal_lahir,
                'jenis_kelamin' => $jenis_kelamin,
                'alamat' => $alamat,
                'id_asal_instansi' => $id_instansi,
                'id_kategori' => $kategori,
                'no_telepon' => $telepon,
                'bukti_pembayaran' => $_POST["bukti_pembayaran"]

            ]);
            $_SESSION['success'] = 'Register Berhasil, silahkan menunggu Whatsapp dari admin untuk persetujuan akun.';
            return $this->view('pages/auth/user/loginsantri', $_SESSION);
        } else {
            $_SESSION['error'] = 'Register failed, Please try again';
            return $this->view('register', $_SESSION);
        }
    }

    public function login()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user = new User();
        $user = $user->getByEmail($email);

        if ($user) {
            if ($user->status == 'WAITING') {
                $_SESSION['error'] = "Akun anda belum di setujui oleh admin belum bisa login";
            } else {
                $hashedPassword = $user->password;
                if (password_verify($password, $hashedPassword)) {
                    $_SESSION['user'] = [
                        'id' => $user->id,
                        'name' => $user->name,
                        'email' => $user->email,
                        'role' => $user->role,
                    ];
                    header('Location: /page');
                    exit();
                } else {
                    $errorMessage = "Password incorrect.";
                }
            }
        } else {
            $errorMessage = "Email not found.";
        }

        header('Location: /loginsantri');
        exit();
    }
}
