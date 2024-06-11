<?php

namespace app\controllers;

require_once '../core/Autoloader.php';

use core\Controller;
use app\models\Kegiatan;

class KegiatanController extends Controller
{
    public function __construct()
    {
        if (!$this->isAuthenticated()) {
            header('Location: /');
            exit;
        }
    }

    public function index()
    {
        $kegiatan = new Kegiatan();
        $kegiatan = $kegiatan->all();
        $this->view('pages/user/kegiatan', [
            'kegiatan' => $kegiatan
        ]);
    }
    public function store()
    {
        try {
            $request = $_POST;
            $file = $_FILES['foto'];

            if (!isset($file) || $file['error'] != UPLOAD_ERR_OK) {
                throw new \Exception('File upload error.');
            }

            if ($file['size'] > 5000000) {
                throw new \Exception('File size exceeded.');
            }

            $validMimeTypes = ['image/jpeg', 'image/png', 'image/jpg'];
            $fileType = mime_content_type($file['tmp_name']);

            if (!in_array($fileType, $validMimeTypes)) {
                throw new \Exception('Invalid file format.');
            }

            $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
            $filename = uniqid() . '.' . $ext;

            $targetDir = 'images/kegiatan/';
            if (!is_dir($targetDir)) {
                mkdir($targetDir, 0777, true);
            }

            $filepath = $targetDir . $filename;

            if (!move_uploaded_file($file['tmp_name'], $filepath)) {
                throw new \Exception('Failed to move uploaded file.');
            }
            $tanggalFormatted = date('d-m-Y', strtotime($request['tanggal']));
            // var_dump($tanggalFormatted);
            // die;

            $kegiatan = new Kegiatan();
            $kegiatan->create([
                'nama_kegiatan' => $request['nama_kegiatan'],
                'foto' => $filepath,
                'deskripsi' => $request['deskripsi'],
                'tanggal' => $request['tanggal']
            ]);

            $_SESSION['success'] = 'Sukses menambahkan kegiatan';
            header('Location: /kegiatan');
            exit;
        } catch (\Throwable $th) {
            $_SESSION['error'] = $th->getMessage();
            header('Location: /kegiatan');
            exit;
        }
    }
    public function update($data)
    {
        try {
            $request = $_POST;
            $file = $_FILES['foto'];
            $kegiatanId = $data['id'];

            $kegiatan = new Kegiatan();
            $existingKegiatan = $kegiatan->find($kegiatanId);

            if (!$existingKegiatan) {
                throw new \Exception('Kegiatan tidak ditemukan.');
            }

            $filePath = $existingKegiatan->foto;

            if (isset($file) && $file['error'] == UPLOAD_ERR_OK) {
                if ($file['size'] > 5000000) {
                    throw new \Exception('Ukuran file melebihi batas.');
                }

                $validMimeTypes = ['image/jpeg', 'image/png', 'image/jpg'];
                $fileType = mime_content_type($file['tmp_name']);

                if (!in_array($fileType, $validMimeTypes)) {
                    throw new \Exception('Format file tidak valid.');
                }

                $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
                $filename = uniqid() . '.' . $ext;

                $targetDir = 'public/images/kegiatan/';
                if (!is_dir($targetDir)) {
                    mkdir($targetDir, 0777, true);
                }

                $newFilePath = $targetDir . $filename;

                if (!move_uploaded_file($file['tmp_name'], $newFilePath)) {
                    throw new \Exception('Gagal memindahkan file yang diunggah.');
                }

                if ($filePath && file_exists($filePath) && $filePath !== $newFilePath) {
                    unlink($filePath);
                }

                $filePath = $newFilePath;
            }

            $kegiatan->update([
                'nama_kegiatan' => $request['nama_kegiatan'],
                'foto' => $filePath,
                'deskripsi' => $request['deskripsi'],
                'tanggal' => $request['tanggal']
            ], $kegiatanId);

            $_SESSION['success'] = 'Sukses memperbarui kegiatan';
            header('Location: /kegiatan');
            exit;
        } catch (\Throwable $th) {
            $_SESSION['error'] = $th->getMessage();
            header('Location: /kegiatan');
            exit;
        }
    }
    public function destroy($data)
    {
        try {
            $kegiatan = new Kegiatan();
            $kegiatan = $kegiatan->find($data['id']);
            if (!$kegiatan) {
                throw new \Exception('Kegiatan tidak ditemukan.');
            }

            $filePath = $kegiatan->foto;
            if ($filePath && file_exists($filePath)) {
                unlink($filePath);
            }

            $kegiatan = new Kegiatan();
            $kegiatan->delete($data['id']);

            $_SESSION['success'] = 'Sukses menghapus kegiatan';
            header('Location: /kegiatan');
            exit;
        } catch (\Throwable $th) {
            $_SESSION['error'] = $th->getMessage();
            header('Location: /kegiatan');
            exit;
        }
    }
}