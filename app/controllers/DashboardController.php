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
}

?>