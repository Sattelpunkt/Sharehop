<?php

namespace Core;

use Config\BaseConfig;

class Router
{

    private array $routes = [];

    public function __construct()
    {
        require_once SRC . DS . 'Routes' . DS . 'App.php';
    }

    public function add(string $pattern, string $handler, array $middleware = []): void
    {
        $pattern = preg_replace('/:([\w-]+)/', '(?<$1>[\w-]+)', $pattern);

        $this->routes[] = [
            'pattern' => "#^$pattern$#",
            'handler' => $handler,
            'middleware' => $middleware
        ];
    }

    public function route(string $url): void
    {
        foreach ($this->routes as $route) {
            if (preg_match($route['pattern'], $url, $matches)) {
                $params = [];
                foreach ($matches as $key => $value) {
                    if (is_string($key)) {
                        $params[$key] = $value;
                    }
                }
                $this->callHandler($route['handler'], $params, $route['middleware']);
                return;
            }
        }
        #ToDo Weiterleitung auf Error -> Keine Route gefunden
        echo "Route nicht gefunden";
    }

    private function callHandler(string $handler, array $params = [], array $middleware = []): void
    {
        if (preg_match('/@/i', $handler)) {
            list($controller, $action) = explode('@', $handler);
        } else {
            $controller = $handler;
            $action = BaseConfig::$config['default_action'];
        }
        $controller .= "Controller";
        $controller = "App\\" . $controller;
        $action .= "Action";
        $cleanUserData = $this->callMiddleware($middleware);

        $app = new $controller();
        $app->$action($params, $cleanUserData);
    }

    private function callMiddleware(array $middleware = []): array
    {
        $mw = 'App\Middleware\CleanUserDataMiddleware';
        $mwInstance = new $mw();
        $cleanUserData = $mwInstance->handle();
        if (!empty($middleware)) {
            foreach ($middleware as $mw) {
                $mw = 'App\\' . 'Middleware' . '\\' . $mw . 'Middleware';
                $mwInstance = new $mw();
                $mwInstance->handle();
            }
        }
        return $cleanUserData;
    }

    public static function go($location): void
    {
        header('Location: https://' . URL . $location);
        exit();
    }

}
