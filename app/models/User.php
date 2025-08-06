<?php

require_once __DIR__ . "/../../core/Model.php";

class User extends Model {
    private $table = 'users';

    private function checkEmail($email) {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM {$this->table} WHERE email = :email LIMIT 1");
            return count($stmt->fetch()) == 1;
        } catch (PDOException $e) {
            die("Check email failed: " . $e->getMessage());
        }
    }

    private function checkPasswordRepeat($password, $rePassword) {
        return $password == $rePassword;
    }

    public function getAllUsers() {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM {$this->table}");
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOExcepiton $e) {
            die("Get all users failed: " . $e->getMessage());
        }
    }

    public function signUp($fullname, $email, $password, $rePassword) {
        try {
            if (
                !empty($fullname) && !empty($email) && !empty($password) && !empty($rePassword) &&
                $this->checkEmail($email) && 
                $this->checkPasswordRepeat($password, $rePassword)
            ) {
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
                    die("Sign up failed: " . $e->getMessage());
                }
            }
        } catch (PDOException $e) {
            die("Sign Up failed: " . $e->getMessage());
        }
    }
}

?>