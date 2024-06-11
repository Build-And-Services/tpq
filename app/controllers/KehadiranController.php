<?php

namespace app\controllers;

require_once '../core/Autoloader.php';

use app\models\Kehadiran;
use PDOException;
use app\models\User;
use core\Controller;

class KehadiranController extends Controller
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
        $kehadiran = new Kehadiran();
        $kehadiran = $kehadiran->all();
        $this->view('pages/user/presensi', [
            'kehadiran' => $kehadiran
        ]);
    }

    public function add()
    {
        $this->view('pages/user/createPresensi');
    }

    public function store()
    {
        try {
            $request = $_POST;
            $kehadiran = new Kehadiran();
            $id_kelas = $request['id_kelas'];
            $statuses = isset($request['status']) ? $request['status'] : [];
            $tanggal = date('Y-m-d');
    
            foreach ($statuses as $id_user => $status) {
                $data = [
                    'id_user' => $id_user,
                    'id_kelas' => $id_kelas,
                    'tanggal' => $tanggal,
                    'status' => $status
                ];
                $kehadiran->create($data);
            }
    
            $_SESSION['success'] = 'Sukses menambahkan kehadiran';
            header('Location: /pages/user/presensi');
        } catch (\Throwable $th) {
            $_SESSION['error'] = $th->getMessage();
            header('Location: /pages/user/presensi/create');
        }
    }

}