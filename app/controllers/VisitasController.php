<?php
namespace app\controllers;

use app\models\visitas;
use models\Visits;

class VisitasController {
    public function index() {
        session_start();
        $model = new Visits();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $model->create(
                $_POST['nombre'],
                $_POST['email'],
                $_POST['comentario'],
                $_SERVER['REMOTE_ADDR'],
                $_SERVER['HTTP_USER_AGENT']
            );
            $_SESSION['success'] = 'Visita registrada correctamente.';
            header('Location: /visitas');
            exit;
        }

        $visits = $model->all();
        require __DIR__ . '/../views/visitas.php';
    }
}
