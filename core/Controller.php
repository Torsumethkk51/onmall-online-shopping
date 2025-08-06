<?php

class Controller {
    public function model($modelName) {
        require_once __DIR__ . "/../app/models/$modelName.php";
        return new $modelName();
    }

    public function view($viewName, $data = []) {
        require_once __DIR__ . "/../app/views/$viewName.php";
    }
}

?>