<?php

namespace app\controllers;

require_once '../core/Autoloader.php';

use app\models\Penilaian;
use PDOException;
use app\models\User;
use core\Controller;

class PenilaianController extends Controller
{
    // public function __construct()
    // {
    //     if (!$this->isAuthenticated()) {
    //         header('Location: /');
    //         exit();
    //     }
    // }

    public function index()
    {
        $penilaian = new Penilaian();
        $penilaian = $penilaian->allWithUserNames();
        $this->view('pages/user/penilaian/index', [
            'penilaian' => $penilaian
        ]);
    }

    public function add()
    {
        $users = new User();
        $users = $users->getRole();
        $this->view('pages/user/penilaian/create', [
            'users' => $users
        ]);
    }

    public function store()
    {
        try {
            $request = $_POST;
            $penilaian = new Penilaian();
            
            $halaman_klasikal = isset($request['halaman_klasikal']) ? $request['halaman_klasikal'] : [];
            $halaman_baca = isset($request['halaman_baca']) ? $request['halaman_baca'] : [];
            $penilaian_data = isset($request['penilaian']) ? $request['penilaian'] : [];
            $tanggal = date('Y-m-d');

            foreach ($halaman_klasikal as $id_user => $hal_klasikal) {
                if ($hal_klasikal !== null && $hal_klasikal !== '' && 
                    $halaman_baca[$id_user] !== null && $halaman_baca[$id_user] !== '' && 
                    $penilaian_data[$id_user] !== null && $penilaian_data[$id_user] !== '') {
                    $data = [
                        'id_user' => $id_user,
                        'halaman_klasikal' => $hal_klasikal,
                        'halaman_baca' => $halaman_baca[$id_user],
                        'tanggal' => $tanggal,
                        'kriteria' => $penilaian_data[$id_user]
                    ];
                    $penilaian->create($data);
                }
            }

            echo json_encode(['status' => 'success', 'message' => 'Sukses menambahkan penilaian']);
        } catch (\Throwable $e) {
            echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }


}