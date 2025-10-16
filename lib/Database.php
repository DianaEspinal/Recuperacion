<?php

namespace lib;

use PDO;
use PDOException;

class Database {
    private $host = "db";
    private $db_name = "blog_sistemas";
    private $username = "root";
    private $password = "rootpass";
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name,
                                  $this->username, $this->password);
            $this->conn->exec("set names utf8");
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            die ("Error de conexión: " . $exception->getMessage());
        }
        return $this->conn;
    }

}
?>