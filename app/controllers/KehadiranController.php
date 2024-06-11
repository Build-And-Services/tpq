<?php

namespace app\controllers;

require_once '../core/Autoloader.php';

use app\models\Kehadiran;
use PDOException;
use app\models\User;
use core\Controller;

class KehadiranController extends Controller
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
        $kehadiran = new Kehadiran();
        $kehadiran = $kehadiran->allWithUserNames();
        $this->view('pages/user/kehadiran/index', [
            'kehadiran' => $kehadiran
        ]);
    }

    public function add()
    {
        $users = new User();
        $users = $users->getRole();
        $this->view('pages/user/kehadiran/create', [
            'users' => $users
        ]);
    }

    public function store()
    {
        try {
            $request = $_POST;
            $penilaian = new Kehadiran();
            
            $selected_users = isset($request['selected_users']) ? $request['selected_users'] : [];
            $tanggal = date('Y-m-d');

            $allUsers = new User(); 
            $allUsers = $allUsers->all(); 

            foreach ($allUsers as $user) {
                $status = in_array($user->id_user, $selected_users) ? 1 : 0;
                $data = [
                    'id_user' => $user->id_user,
                    'status' => $status,
                    'tanggal' => $tanggal
                ];
                $penilaian->create($data);
            }
            echo json_encode(['status' => 'success', 'message' => 'Sukses menambahkan penilaian']);
        } catch (\Throwable $e) {
            echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

}