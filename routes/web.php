<?php

namespace routes;

require_once '../core/Autoloader.php';

use core\Router;

Router::get('/', 'AuthController', 'index');
Router::get('/page', 'AuthController', 'pageView');
Router::get('/login-admin', 'AuthController', 'viewLoginAdmin');
Router::get('/login', 'AuthController', 'pageLogin');
Router::get('/loginsantri', 'AuthController', 'viewLoginSantri');
Router::get('/loginasatidz', 'AuthController', 'viewLoginAsatidz');
Router::get('/register-santri', 'AuthController', 'viewRegisterSantri');
Router::get('/register-asatidz', 'AuthController', 'viewRegisterAsatidz');
Router::post('/signup-santri', 'AuthController', 'registerSantri');
Router::post('/login', 'AuthController', 'login');
