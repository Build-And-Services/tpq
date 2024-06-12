<?php

namespace app\controllers;

require_once '../core/Autoloader.php';

use core\Controller;
use app\models\Kelas;
use app\models\Santri;
use app\models\Kategori;

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
        if (!isset($_SESSION['user'])) {
            header('Location: /loginsantri');
            exit();
        }

        $id_user = $_SESSION['user']['id'];
        $kelas = new Kelas();
        $kelasUser = $kelas->getKelasByUserId($id_user);
        $kelas = $kelas->detailKelas();

        $kategoriModel = new Kategori();
        $kategori = $kategoriModel->all();

        $this->view('pages/user/kelas', [
            'kelas' => $kelas,
            'kategori' => $kategori,
            'kelasUser' => $kelasUser
        ]);
    }
    public function update()
    {
        $request = $_POST;
        // var_dump($request);
        // die;
        $kelas = new Kelas();
        $kelas->updateKelas($request['id_kelas'], $request['id_kategori'], $request['link_meet'], $request['jadwal'], $request['mulai'], $request['selesai']);
        header('Location: /kelas');
    }
    public function destroy($data)
    {
        $kelas = new Kelas();
        $kelas = $kelas->where(['id_kelas' => $data['id']]);
        $kelas = new Kelas();
        $kelas->deleteKelas($data['id']);
        $_SESSION['success'] = 'Sukses menghapus kelas';
        header('Location: /kelas');
        exit;
    }
}