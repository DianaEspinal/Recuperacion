<?php
namespace app\models;
use PDO;

class Visita {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function registrar($nombre, $correo, $comentario) {
        $sql = "INSERT INTO visitas (nombre, correo, comentario) VALUES (:nombre, :correo, :comentario)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':comentario', $comentario);
        return $stmt->execute();
    }

    public function obtenerTodas() {
        $sql = "SELECT * FROM visitas ORDER BY fecha DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>