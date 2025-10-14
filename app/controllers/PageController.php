<?php
namespace app\controllers;

class PageController {
    public function miInfo() {
        require __DIR__ . '/../views/mi-info.php';
    }

    public function dia($slug = null) {
        $file = __DIR__ . "/../views/{$slug}.php";
        if (file_exists($file)) {
            require $file;
        } else {
            echo "<h2>No se encontró la página del día solicitado.</h2>";
        }
    }
}
