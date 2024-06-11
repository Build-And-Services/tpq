<?php

namespace app\controllers;

require_once '../core/Autoloader.php';

use app\models\User;
use core\Controller;

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
            'role'=> 'Asatidz'
        ]);
    }
}