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
Router::post('/signup-asatidz', 'AuthController', 'registerAsatidz');
Router::post('/login', 'AuthController', 'login');
Router::get('/logout', 'AuthController', 'logout');
Router::get('/kegiatan', 'KegiatanController', 'index');
Router::post('/kegiatan/store', 'KegiatanController', 'store');
Router::post('/kegiatan/update/{id}', 'KegiatanController', 'update');
Router::get('/kegiatan/delete/{id}', 'KegiatanController', 'destroy');
Router::get('/kehadiran', 'KehadiranController', 'index');
Router::get('/kehadiran/create', 'KehadiranController', 'add');
Router::post('/kehadiran/store', 'KehadiranController', 'store');
Router::get('/penilaian', 'PenilaianController', 'index');
Router::get('/penilaian/create', 'PenilaianController', 'add');
Router::post('/penilaian/store', 'PenilaianController', 'store');
Router::get('/profile', 'ProfilAsatidzController', 'index');
Router::get('/profile/edit', 'ProfilAsatidzController', 'edit');
Router::post('/profile/update/{id}', 'ProfilAsatidzController', 'updateUser');

Router::get('/kelas', 'KelasController', 'index');
Router::get('/kelas/delete/{id}', 'KelasController', 'destroy');
Router::post('/kelas/update', 'KelasController', 'update');

Router::get('/datatpq', 'DataTpqController', 'index');
Router::get('/datatpq/{id}', 'DataTpqController', 'edit');
Router::get('/datatpq/delete/{id}', 'DataTpqController', 'destroy');
Router::post('/datatpq/update/{id}', 'DataTpqController', 'update');
