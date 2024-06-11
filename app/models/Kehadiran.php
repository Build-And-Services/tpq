<?php

namespace app\models;

require_once '../core/Autoloader.php';

use core\Model;

class Kehadiran extends Model
{
    protected string $table = 'kehadiran';
    private int $id;
}