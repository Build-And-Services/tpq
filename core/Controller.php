<?php

namespace core;

use core\RequestHandler;

class Controller
{
    public $request;
    public function __construct(){
        $this->request = new RequestHandler();
    }

    protected function view($filename = '', $data = [])
    {
        extract($data);
        require_once '../app/views/' . $filename . '.php';
    }

    protected function isAuthenticated()
    {
        return isset($_SESSION['user']);
    }

    public function checkRole($role)
    {
        return $_SESSION['user']['role'] === $role;
    }
}