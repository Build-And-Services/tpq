<?php

namespace app\models;

require_once '../core/Autoloader.php';

use core\Model;

class Kategori extends Model
{
    protected string $table = 'kategori';
    private int $id;
}