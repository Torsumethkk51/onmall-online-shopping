<?php

require_once __DIR__ . "/../../core/Controller.php";

class DashboardController extends Controller {
    public function index() {
        $this->view("dashboard/index");
    }

    public function users() {
        $model = $this->model("User");
        $users = $model->getAllUsers();
        $this->view("dashboard/users", [
            "users" => $users
        ]);
    }

    public function create() {
        $model = $this->model("User");

        if (
            !isset($_POST["sign-up"]) ||
            empty($_POST["fullname"]) ||
            empty($_POST["email"]) ||
            empty($_POST["password"]) ||
            empty($_POST["re-password"])
        ) {
            $this->view("dashboard/users", [
                "errors" => [
                    "invalid" => "Please fill out the form completely."
                ],
                "users" => null
            ]);
            return;
        }

        $fullname = trim($_POST["fullname"]);
        $email = trim($_POST["email"]);
        $password = trim($_POST["password"]);
        $rePassword = trim($_POST["re-password"]);

        $errors = [];

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors["email"] = "Please enter a valid email address.";
        } else if (count($model->getUserByEmail($email)) > 0) {
            $errors["email"] = "There is already an account using this email.";
        }

        if (strlen($password) < 8) {
            $errors["password"] = "Password must be more than 8 characters long.";
        } else if ($password !== $rePassword) {
            $errors["re-password"] = "Passwords don't match.";
        }

        if (count($errors) === 0) {
            $model = $this->model("User");
            $model->signUp($fullname, $email, $password, $rePassword);

            header("Location: users");
            exit();
        } else {
            $this->view("dashboard/users", [
                "errors" => $errors,
                "users" => null
            ]);
            return;
        }
    }
}

?>