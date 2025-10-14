<?php
namespace app\controllers;

class DiasController {
    public function ver($n) {
        $vista = __DIR__ . "/../views/dia{$n}.php";

        if (file_exists($vista)) {
            ob_start();
            include $vista;
            return ob_get_clean();
        } else {
            http_response_code(404);
            return "Día {$n} no encontrado.";
        }
    }
}