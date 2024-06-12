<?php

namespace app\models;

require_once '../core/Autoloader.php';

use PDO;
use core\Model;

class Kelas extends Model
{
    protected string $table = 'kelas';
    public function detailKelas()
    {
        $sql = "
            SELECT
                kelas.*,
                kategori.kategori
            FROM
                kelas
            JOIN
                kategori
            ON
                kelas.id_kategori = kategori.id_kategori
            ORDER BY
                kelas.jadwal ASC,
                kelas.mulai ASC;
        ";

        $prepare = $this->pdo->prepare($sql);
        $prepare->execute();
        $result = $prepare->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function deleteKelas($id_kelas)
    {
        try {
            $sql = "DELETE FROM kelas WHERE id_kelas = :id_kelas";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id_kelas', $id_kelas, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->rowCount();
        } catch (\PDOException $e) {
            error_log('Error: ' . $e->getMessage());
            return false;
        }
    }
    public function updateKelas($id_kelas, $id_kategori, $link_meet, $jadwal, $mulai, $selesai)
    {
        try {
            $sql = "UPDATE kelas SET id_kategori = :id_kategori, link_meet = :link_meet, jadwal = :jadwal, mulai = :mulai, selesai = :selesai WHERE id_kelas = :id_kelas";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id_kelas', $id_kelas, PDO::PARAM_INT);
            $stmt->bindParam(':id_kategori', $id_kategori, PDO::PARAM_INT);
            $stmt->bindParam(':link_meet', $link_meet, PDO::PARAM_STR);
            $stmt->bindParam(':jadwal', $jadwal, PDO::PARAM_STR);
            $stmt->bindParam(':mulai', $mulai, PDO::PARAM_STR);
            $stmt->bindParam(':selesai', $selesai, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->rowCount();
        } catch (\PDOException $e) {
            error_log('Error: ' . $e->getMessage());
            return false;
        }
    }

    public function getKelasByUserId($id_user)
    {
        $sql = "
            SELECT
                kelas.*,
                kategori.kategori
            FROM
                kelas
            JOIN
                kategori ON kelas.id_kategori = kategori.id_kategori
            LEFT JOIN
                santri ON santri.id_kategori = kategori.id_kategori
            LEFT JOIN
                asatidz ON asatidz.id_kategori = kategori.id_kategori
            WHERE
                (santri.id_user = ? OR asatidz.id_user = ?)
            ORDER BY
                kelas.jadwal ASC,
                kelas.mulai ASC;
        ";

    $prepare = $this->pdo->prepare($sql);
    $prepare->execute([$id_user, $id_user]); // Gunakan array untuk placeholder parameter
    $result = $prepare->fetchAll(PDO::FETCH_OBJ);
    return $result;
}


}