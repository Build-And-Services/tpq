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
        $this->view('welcome');
    }
    public function loginUser()
    {
        $this->view('pages/auth/user/login');
    }

}