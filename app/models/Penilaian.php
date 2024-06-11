<?php

namespace app\models;

require_once '../core/Autoloader.php';

use core\Model;

class Penilaian extends Model
{
    protected string $table = 'penilaian';
    private int $id;
}