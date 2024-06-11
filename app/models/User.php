<?php

namespace app\models;

require_once '../core/Autoloader.php';

use PDO;
use core\Model;

class User extends Model
{
    protected string $table = 'users';

    public function getByEmail($email)
    {
        $result = $this->where(['email' => $email]);
        return $result ? $result[0] : null;
    }

    public function getProfileAsatidz($id_user) {
        $sql = "
            SELECT 
                u.id_user,
                u.name,
                u.email,
                u.role,
                u.status,
                a.tgl_lahir,
                a.jenis_kelamin,
                a.alamat,
                a.id_kabupaten,
                a.id_asal_instansi,
                a.id_kategori,
                a.no_telepon,
                a.bukti_ketersedian_mengajar,
                a.bukti_syahadah
            FROM 
                users u
            JOIN 
                asatidz a ON u.id_user = a.id_user
            WHERE 
                u.id_user = :id_user
        ";
        $prepare = $this->pdo->prepare($sql);
        $prepare->bindValue(':id_user', $id_user, PDO::PARAM_INT);
        $prepare->execute();
        $result = $prepare->fetch(PDO::FETCH_OBJ);
        return $result;
    }
}
