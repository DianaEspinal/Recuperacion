<?php
namespace models;

use lib\Database;

class Visits {
    public function create($nombre, $email, $comentario, $ip, $ua) {
        $pdo = (new Database())->getConnection();
        $stmt = $pdo->prepare("INSERT INTO visitas (nombre,email,comentario,ip_address,user_agent) VALUES (?,?,?,?,?)");
        $stmt->execute([$nombre, $email, $comentario, $ip, $ua]);
    }

    public function all() {
        $pdo = (new Database())->getConnection();
        return $pdo->query("SELECT * FROM visitas ORDER BY created_at DESC")->fetchAll(\PDO::FETCH_ASSOC);
    }
}
