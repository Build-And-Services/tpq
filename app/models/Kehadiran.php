<?php

namespace app\models;

require_once '../core/Autoloader.php';

use PDO;
use core\Model;

class Kehadiran extends Model
{
    protected string $table = 'kehadiran';
    private int $id;

    public function allWithUserNames() {
        $sql = "
            SELECT k.*, u.name 
            FROM {$this->table} k
            JOIN users u ON k.id_user = u.id_user
            WHERE u.role = 'santri'
        ";
        $prepare = $this->pdo->prepare($sql);
        $prepare->execute();
        $result = $prepare->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
}