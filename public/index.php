<?php

$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

spl_autoload_register(function (string $class_name) {
    require "../src/" . str_replace("\\", "/", $class_name) . ".php";
});

$router = new Framework\Router;

$router->add("/{controller}/{action}");
$router->add("/{controller}/{action}/{id}");
$router->add("/home/index", ["controller" => "home", "action" => "index"]);
$router->add("/products", ["controller" => "products", "action" => "index"]);
$router->add("/", ["controller" => "home", "action" => "index"]);

$params = $router->match($path);

print_r($params);

if ($params === false) {
    exit("No route matched.");
}

$controller = "App\Controllers\\" . ucwords($params["controller"]);
$action = $params["action"];

$controller_object = new $controller;

$controller_object->$action();
