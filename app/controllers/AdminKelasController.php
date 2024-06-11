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
        $this->view('pages/admin/kelas/index', [
            'kelas' => $kelas
        ]);
    }

    public function edit($data)
    {
        try {
            $kelas = new Kelas();
            $kelas = $kelas->find($data['id']);
            if (!$kelas) {
                throw new \Exception("Kelas tidak ada");
            }
            $this->view('pages/admin/kelas/edit', [
                'kelas' => $kelas
            ]);
        } catch (\Throwable $th) {
            $_SESSION['error'] = $th->getMessage();
            header('Location: /admin/kelas');
        }
    }

    public function delete($data)
    {
        try {
            $kelas = new Kelas();
            $kelas = $kelas->find($data['id']);
            if (!$kelas->id) {
                throw new \Exception("Kelas tidak ada");
            }
            $kelas = new Kelas();
            $kelas->delete($data['id']);
            $_SESSION['success'] = 'Sukses menghapus kelas.';
            header('Location: /admin/kelas');
        } catch (\Throwable $th) {
            $_SESSION['error'] = $th->getMessage();
            header('Location: /admin/kelas');
        }
    }

    public function store()
    {
        try {
            $request = $_POST;
            $kelas = new Kelas();
            $kelas->create($request);
            $_SESSION['success'] = 'Sukses menambahkan kelas';
            header('Location: /admin/kelas');
        } catch (\Throwable $th) {
            $_SESSION['error'] = $th->getMessage();
            header('Location: /admin/kelas');
        }
    }

    public function update()
    {
        try {
            $request = $_POST;
            $id = $request['id'];
            unset($request['id']);
            $kelas = new Kelas();
            $kelas->update($request, $id);
            $_SESSION['success'] = 'Success update book.';
            header('Location: /admin/kelas');
        } catch (\Throwable $th) {
            $_SESSION['error'] = $th->getMessage();
            header('Location: /admin/kelas');
        }
    }
}