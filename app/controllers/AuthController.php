<?php

namespace app\controllers;

require_once '../core/Autoloader.php';

use PDOException;
use app\models\User;
use core\Controller;

class AuthController extends Controller
{
    public function index()
    {
        if ($this->isAuthenticated()) {
            header('Location: /dashboard');
            exit();
        }
        $this->view('landing');
    }
    public function pageLogin()
    {
        $this->view('pages/auth/user/login');
    }
}
