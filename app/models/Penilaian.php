<?php

namespace app\models;

require_once '../core/Autoloader.php';

use PDO;
use core\Model;

class Penilaian extends Model
{
    protected string $table = 'penilaian';
    private int $id;

    public function allWithUserNames() {
        $sql = "
            SELECT p.*, u.name 
            FROM {$this->table} p
            JOIN users u ON p.id_user = u.id_user
            WHERE u.role = 'santri'
        ";
        $prepare = $this->pdo->prepare($sql);
        $prepare->execute();
        $result = $prepare->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
}