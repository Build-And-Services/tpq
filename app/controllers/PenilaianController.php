<?php

namespace app\controllers;

require_once '../core/Autoloader.php';

use app\models\Penilaian;
use PDOException;
use app\models\User;
use core\Controller;

class PenilaianController extends Controller
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
        $penilaian = new Penilaian();
        $penilaian = $penilaian->allWithUserNames();;
        $this->view('pages/user/penilaian', [
            'penilaian' => $penilaian
        ]);
    }

    public function add()
    {
        $this->view('pages/user/createPenilaian');
    }

    public function store()
    {
        try {
            $request = $_POST;
            $penilaian = new Penilaian();
            $halaman_klasikal = isset($request['halaman_klasikal']) ? $request['halaman_klasikal'] : [];
            $halaman_baca = isset($request['halaman_baca']) ? $request['halaman_baca'] : [];
            $kriteria = isset($request['kriteria']) ? $request['kriteria'] : [];
            $tanggal = date('Y-m-d'); 
    
            foreach ($halaman_klasikal as $id_user => $hal_klasikal) {
                $data = [
                    'id_user' => $id_user,
                    'halaman_klasikal' => $hal_klasikal,
                    'halaman_baca' => $halaman_baca[$id_user],
                    'tanggal' => $tanggal,
                    'kriteria' => $kriteria[$id_user]
                ];
                $penilaian->create($data);
            }
    
            $_SESSION['success'] = 'Sukses menambahkan penilaian';
            header('Location: /penilaian');
        } catch (\Throwable $e) {
            $_SESSION['error'] = $e->getMessage();
            header('Location: /penilaian/create');
        }
    }
}