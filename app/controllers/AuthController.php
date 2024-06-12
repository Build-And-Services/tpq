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

    public function registerAsatidz()
    {
        try {
            var_dump($this->request->all());
            $user = new User();
            $hashed_password = password_hash($this->request->password, PASSWORD_BCRYPT);
            $id_user = $user->insertGetId([
                'name' => $this->request->nama_asatidz,
                'email' => $this->request->email,
                'password' => $hashed_password,
                'role' => 'asatidz',
                'status' => 'WAITING'
            ]);

            $asatidz = new Asatidz();

            $asatidz->create([
                'id_user' => $id_user,
                'tgl_lahir' => $this->request->tgl_lahir,
                'jenis_kelamin' => $this->request->jenis_kelamin,
                'alamat' => $this->request->alamat,
                'id_kabupaten' => 1,
                'instansi' => $this->request->instansi,
                'id_kategori' => $this->request->id_kategori,
                'no_telepon' => $this->request->no_telepon,
                'bukti_ketersedian_mengajar' => $this->request->ketersedia_mengajar,
                'bukti_syahadah' => $this->request->syahadah_tilawati,
                'motivasi_mengajar' => $this->request->motivasi,
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
            $bukti_pembayaran = $_POST['bukti_pembayaran'];

            $hashed_password = password_hash($password, PASSWORD_BCRYPT);

            $user = new User();
            $id_user = $user->insertGetId([
                'name' => $name,
                'email' => $email,
                'password' => $hashed_password,
                'role' => 'santri',
                'status' => 'WAITING'
            ]);

            $santri = new Santri();
            $santri->create([
                'id_user' => $id_user,
                'tgl_lahir' => $tanggal_lahir,
                'jenis_kelamin' => $jenis_kelamin,
                'alamat' => $alamat,
                'instansi' => $instansi,
                'id_kategori' => $kategori,
                'no_telepon' => $telepon,
                'bukti_pembayaran' => $bukti_pembayaran

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
        $role = $_POST['role'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user = new User();
        $user = $user->getByEmail($email);

        if ($user) {
            if ($user->status == 'WAITING') {
                $_SESSION['error'] = "Akun anda belum di setujui oleh admin belum bisa login";
                $this->redirectToLoginPageWhenFail($role);
            } else {
                $hashedPassword = $user->password;
                if (password_verify($password, $hashedPassword)) {
                    $userK = new User();
                    // var_dump($user, $role);
                    $kategori = $userK->getKategoriById($user->id_user, $role);
                    $_SESSION['user'] = [
                        'id' => $user->id_user,
                        'name' => $user->name,
                        'email' => $user->email,
                        'role' => $user->role,
                        'kategori' => $kategori->id_kategori,
                    ];
                    header('Location: /page');
                    exit();
                } else {
                    $_SESSION['error'] = "Password incorrect.";
                    $this->redirectToLoginPageWhenFail($role);
                }
            }
        } else {
            $_SESSION['error'] = "Email not found.";
            $this->redirectToLoginPageWhenFail($role);
        }

        $this->redirectToLoginPageWhenFail($role);
        exit();
    }

    private function redirectToLoginPageWhenFail($role)
    {
        switch ($role) {
            case 'admin':
                header('Location: /login-admin');
                break;
            case 'asatidz':
                header('Location: /loginasatidz');
                break;
            case 'santri':
                header('Location: /loginsantri');
            default:
                header('Location: /loginsantri');
                break;
        }
    }
    public function logout()
    {
        session_destroy();
        header('Location: /');
    }
}
