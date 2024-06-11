<?php

namespace app\controllers;

require_once '../core/Autoloader.php';

use app\models\User;
use core\Controller;

class UserController extends Controller
{
    public function __construct()
    {
        if (!$this->isAuthenticated()) {
            header('Location: /');
            exit();
        }
    }

    
}