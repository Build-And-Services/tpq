<?php

namespace app\controllers;

require_once '../core/Autoloader.php';

use app\models\Kelas;
use app\models\User;
use core\Controller;

class DataTpqController extends Controller
{
    public function __construct()
    {
        if (!$this->isAuthenticated()) {
            header('Location: /');
            exit();
        }
    }

    public function index(){
        $user = new User();
        $santri = $user->getRoles('santri');
        $asatidz = $user->getRoles('asatidz');

        return $this->view('pages/admin/tpq/index', [
            'santri' => $santri,
            'asatidz' => $asatidz,
        ]);
    }

    public function update(){}

    public function destroy($data){
        $user = new User();
        $u = $user->where(['id_user' => $data['id']])[0];
        $user->deleteUser($u->id_user, $u->role);
        header('Location: /datatpq');
    }

}