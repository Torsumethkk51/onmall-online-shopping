<?php

require_once __DIR__ . "/../../core/Model.php";

class User extends Model {
    private $table = 'users';

    public function getAllUsers() {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM {$this->table}");
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOExcepiton $e) {
            die("Get all users failed: " . $e->getMessage());
        }
    }

    public function getUserByEmail($email) {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM {$this->table} WHERE email = :email");
            $stmt->execute([
                "email" => $email,
            ]);
            return $stmt->fetchAll();
        } catch (PDOExcepiton $e) {
            die("Get all users failed: " . $e->getMessage());
        }
    }

    public function signUp($fullname, $email, $password, $rePassword) {
        try {
            $stmt = $this->conn->prepare(
                "INSERT INTO {$this->table} (fullname, email, password) VALUES (:fullname, :email, :password)"
            );
            $stmt->execute([
                "fullname" => $fullname,
                "email" => $email,
                "password" => $password
            ]);
            header("Refresh: 0");
        } catch (PDOException $e) {
            die("Sign Up failed: " . $e->getMessage());
        }
    }
}

?>