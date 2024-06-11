<?php

namespace app\controllers;

require_once '../core/Autoloader.php';

use app\models\Kategori;
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
        $kelas = $kelas->detailKelas();
        $kategori = new Kategori();
        $kategori = $kategori->all();
        $this->view('pages/user/kelas', [
            'kelas' => $kelas,
            'kategori' => $kategori,
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