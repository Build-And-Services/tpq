<?php

namespace app\controllers;

require_once '../core/Autoloader.php';

use app\models\User;
use core\Controller;
use app\models\Santri;

class ProfilAsatidzController extends Controller
{
    public function __construct()
    {
        if (!$this->isAuthenticated()) {
            header('Location: /');
            exit();
        }
    }

    public function index()
    {
        $id = $_SESSION['user']['id'];
        $role = $_SESSION['user']['role'];
        $user = new User();
        $profile = $user->getProfile($id, $role);
        return $this->view('pages/profile/index', [
            'profile' => $profile,
            'role'=> $role
        ]);
    }

    public function edit()
    {
        $id = $_SESSION['user']['id'];
        $role = $_SESSION['user']['role'];
        $user = new User();
        $profile = $user->getProfile($id, $role);
        return $this->view('pages/profile/edit', [
            'profile' => $profile,
            'role'=> $role
        ]);
    }

    

    public function updateUser($id_user) 
    {
        $id_user = $_SESSION['user']['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $tgl_lahir = $_POST['tgl_lahir'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $alamat = $_POST['alamat'];
        $id_kategori = $_POST['id_kategori'];
        $userModel = new User();
        $userModel->updateProfile($id_user, $name, $email, $tgl_lahir, $jenis_kelamin, $alamat, $id_kategori);
        header('Location: /profile');
    }
    
    
}