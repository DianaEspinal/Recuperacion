<?php
namespace app\controllers;

class HomeController {
    public function index() {
        require __DIR__ . '/../views/home.php';
    }
}
