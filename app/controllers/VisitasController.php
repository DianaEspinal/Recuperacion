<?php
namespace app\controllers;

use app\models\visita;
use lib\Database;

class VisitasController {
    public function index() {
        $db = (new Database())->getConnection();
        $modelo = new Visita($db);
        $visitas = $modelo->obtenerTodas();
        require_once __DIR__. '/../views/visitas.php';
    }

    public function guardar() {
         if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'] ?? '';
            $correo = $_POST['correo'] ?? '';
            $comentario = $_POST['comentario'] ?? '';

            $db = (new Database())->getConnection();
            $modelo = new Visita($db);

            if ($modelo->registrar($nombre, $correo, $comentario)) {
                header("Location: /visitas");
                exit;
            } else {
                echo "Error al registrar la visita.";
            }
        }
    }
}
