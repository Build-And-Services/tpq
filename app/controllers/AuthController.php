<?php

namespace app\controllers;

require_once '../core/Autoloader.php';

use app\models\Asatidz;
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
        try {
            $user = new User();
            $hashed_password = password_hash($this->request->password, PASSWORD_BCRYPT);
            $id_user = $user->insertGetId([
                'name' => $this->request->nama_asatidz,
                'email' => $this->request->email,
                'password' => $hashed_password,
                'role' => 'asatidz',
                'status' => 'WAITING'
            ]);

            if ($_FILES['ketersedia_mengajar']) {
                $targetDir = $_SERVER['DOCUMENT_ROOT'] . "/images/ketersedia_mengajar/"; // Direktori tujuan penyimpanan
                $targetFile = $targetDir . basename($_FILES["ketersedia_mengajar"]["name"]);
                $upload = move_uploaded_file($_FILES["ketersedia_mengajar"]["tmp_name"], $targetFile);
                if ($upload) {
                    $_POST["ketersedia_mengajar"]  = "/images/ketersedia_mengajar/" . basename($_FILES["ketersedia_mengajar"]["name"]);
                }
            }

            if ($_FILES['syahadah_tilawati']) {
                $targetDir = $_SERVER['DOCUMENT_ROOT'] . "/images/syahadah_tilawati/"; // Direktori tujuan penyimpanan
                $targetFile = $targetDir . basename($_FILES["syahadah_tilawati"]["name"]);
                $upload = move_uploaded_file($_FILES["syahadah_tilawati"]["tmp_name"], $targetFile);
                if ($upload) {
                    $_POST["syahadah_tilawati"]  = "/images/syahadah_tilawati/" . basename($_FILES["syahadah_tilawati"]["name"]);
                }
            }

            $asatidz = new Asatidz();
            $asatidz->create([
                'id_user' => $id_user,
                'tgl_lahir' => $this->request->tgl_lahir,
                'jenis_kelamin' => $this->request->jenis_kelamin,
                'alamat' => $this->request->alamat,
                'id_kabupaten' => 1,
                'id_asal_instansi' => $this->request->id_asal_instansi,
                'id_kategori' => $this->request->id_kategori,
                'no_telepon' => $this->request->no_telepon,
                'bukti_ketersedian_mengajar' => $_POST["ketersedia_mengajar"],
                'bukti_syahadah' => $_POST["syahadah_tilawati"],
            ]);
            header('Location: /loginasatidz');
        } catch (\Throwable $th) {
            header('Location: /register-asatidz');
        
        }
      

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
                        'id' => $user->id_user,
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

    public function logout(){
        session_destroy();
        header('Location: /');
    }
}
