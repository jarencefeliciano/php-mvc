<?php

namespace Framework;

class Dispatcher
{
    public function __construct(private Router $router)
    {
    }

    public function handle(string $path)
    {
        $params = $this->router->match($path);

        if ($params === false) {
            exit("No route matched.");
        }

        $controller = "App\Controllers\\" . ucwords($params["controller"]);
        $action = $params["action"];

        $controller_object = new $controller;

        $controller_object->$action();
    }
}
