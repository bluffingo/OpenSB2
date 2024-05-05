<?php 
// Copyright Chaziz, RGB and Bittoco 2024, all rights reserved.

namespace Qobo\Framework;

use Qobo\App;
use Qobo\Framework\Controller;

class Router {
    private $routes = [];

    private function addRoute($method, $uri, $controller) {
        $this->routes[] = [
            "uri" => $uri,
            "controller" => $controller,
            "method" => $method,
            "middlewares" => []
        ];

        return $this;
    }

    public function GET(string $uri, $controller) {
        return $this->addRoute("GET", $uri, $controller);
    }

    public function POST(string $uri, $controller) {
        return $this->addRoute("POST", $uri, $controller);
    }

    public function PUT(string $uri, $controller) {
        return $this->addRoute("PUT", $uri, $controller);
    }
 
    public function PATCH(string $uri, $controller) {
        return $this->addRoute("PATCH", $uri, $controller);
    }
 
    public function DELETE(string $uri, $controller) {
        return $this->addRoute("DELETE", $uri, $controller);
    }

    public function run($uri, $method) {
        foreach ($this->routes as $route) {
            if ($route["uri"] == $uri && $route["method"] == strtoupper($method)) {
                foreach ($route["middlewares"] as $middleware) {
                    App::resolveMiddleware($middleware, $uri, $method);
                }

                if (is_callable($route["controller"])) {
                    return call_user_func_array($route["controller"], []);
                } else {
                    list($controller, $method) = $route["controller"];

                    try {
                        $reflectedMethod = new \ReflectionMethod($controller, $method);

                        if ($reflectedMethod->isPublic() && (!$reflectedMethod->isAbstract())) {
                            if ($reflectedMethod->isStatic()) {
                                forward_static_call_array([$controller, $method], []);
                            } else {
                                $controller = new $controller();

                                call_user_func_array([$controller, $method], []);
                            }
                        }
                    } catch (\ReflectionException $reflectionException) {}
                }
            }
        }

        $this->abort();
    }

    public function useMiddleware($key) {
        $this->routes[array_key_last($this->routes)]["middlewares"][] = $key;
    }

    private function abort($code = 404) {
        http_response_code($code);
        // TODO: make this less shit
        echo("Not found");
        die();
    }
}