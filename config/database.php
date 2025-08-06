<?php

class Database {
    private $conn;
    private $host = 'localhost';
    private $dbname = 'onmall-db';
    private $username = 'root';
    private $password = '';
    private $pdoConfig = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false
    ];

    public function connect() {
        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->dbname . ";charset=utf8",
                $this->username,
                $this->password,
                $this->pdoConfig 
            );
            return $this->conn;
        } catch (PDOException $e) {
            die('DB connect failed: ' . $e->getMessage());
        }
    }
}

?>