<?php

$uri = $_GET["url"];
if ($uri === "") {
    $uri = "home/index";
}
$uri = explode("/", $uri);

$controllerName = ucfirst($uri[0]) . "Controller";
$methodName = $uri[1] ?? "index";

require_once __DIR__ . "/../app/controllers/{$controllerName}.php";

$controller = new $controllerName();

if (method_exists($controller, $methodName)) {
    $controller->$methodName();
} else {
    echo "Page not found";
}
?>