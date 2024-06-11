<?php

namespace routes;

require_once '../core/Autoloader.php';

use core\Router;

Router::get('/', 'AuthController', 'index');
Router::get('/login', 'AuthController', 'pageLogin');

