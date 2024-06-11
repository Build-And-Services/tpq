<?php 

namespace core;
class RequestHandler {
    // Mengambil seluruh data request
    public function request() {
        return $_POST;
    }

    // Magic method untuk menangani akses dinamis ke properti
    public function __get($name) {
        return $this->input($name);
    }

    // Metode untuk mengambil data dari $_POST
    public function input($key, $default = null) {
        return isset($_POST[$key]) ? $_POST[$key] : $default;
    }

    public function all() {
        return $_POST;
    }
}