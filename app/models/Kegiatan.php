<?php

namespace app\models;

require_once '../core/Autoloader.php';

use core\Model;

class Kegiatan extends Model
{
    protected string $table = 'kegiatan';
    private int $id;
}