<?php

$router = new Framework\Router;

// Specified routes for CRUD
$router->add("/admin/{controller}/{action}", ["namespace" => "Admin"]);
$router->add("/{title}/{id:\d+}/{page:\d+}", ["controller" => "products", "action" => "showPage"]);
$router->add("/product/{slug:[\w-]+}", ["controller" => "products", "action" => "show"]);
$router->add("/home/index", ["controller" => "home", "action" => "index"]);
$router->add("/products", ["controller" => "products", "action" => "index"]);
$router->add("/", ["controller" => "home", "action" => "index"]);

$router->add("/{controller}/show/{id:\d+}", ["action" => "show", "middleware" => "deny|message|message"]);
$router->add("/{controller}/edit/{id:\d+}", ["action" => "edit"]);
$router->add("/{controller}/update/{id:\d+}", ["action" => "update"]);
$router->add("/{controller}/delete/{id:\d+}", ["action" => "delete"]);
$router->add("/{controller}/destroy/{id:\d+}", ["action" => "destroy", "method" => "post"]);

// $router->add("/{controller}/{action}/{id:\d+}");
$router->add("/{controller}/{action}");

return $router;
