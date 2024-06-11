<?php

namespace app\models;

require_once '../core/Autoloader.php';

use core\Model;

class Santri extends Model
{
  protected string $table = 'santri';
  private int $id;
}
