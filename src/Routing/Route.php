<?php

    namespace Framework\Routing;

    class Route
    {
        protected static $routes = [];

        public static function get($uri, $action)
        {
            self::$routes['GET'][$uri] = $action;
        }

        public static function dispatch($uri, $method)
        {
            $uri = rtrim($uri, '/') ?: '/';
            $method = strtoupper($method);

            if(isset(self::$routes[$method][$uri])){
                $action = self::$routes[$method][$uri];

                if(is_callable($action)){
                    return call_user_func($action);
                }

                if(is_array($action)){
                    [$controller, $method] = $action;
                    $controllerInstace = new $controller;
                    return call_user_func([$controllerInstace, $method]);
                }
            }

            http_response_code(404);
            echo "404 - page not found";
        }
    }