<?php

namespace app\controllers;

require_once '../core/Autoloader.php';

use app\models\User;
use core\Controller;

class ProfilAsatidzController extends Controller
{
    public function __construct()
    {
        // if (!$this->isAuthenticated()) {
        //     header('Location: /');
        //     exit();
        // }
    }

    public function index($id_user)
    {
        $user = new User();
        $profile = $user->getProfile(7, 'asatidz');
        return $this->view('pages/profile/index', [
            'profile' => $profile,
            'role'=> 'Asatidz'
        ]);
    }
}