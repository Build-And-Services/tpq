<?php

namespace app\models;

require_once '../core/Autoloader.php';

use core\Model;

class Kelas extends Model
{
    protected string $table = 'kelas';
    private int $id;
}