<?php

namespace app\controllers;

require_once '../core/Autoloader.php';

use app\models\Kelas;
use core\Controller;

class KelasController extends Controller
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
        $kelas = new Kelas();
        $kelas = $kelas->all();
        $this->view('pages/user/kelas', [
            'kelas' => $kelas
        ]);
    }
}