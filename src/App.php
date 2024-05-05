<?php 
// Copyright Chaziz, RGB and Bittoco 2024, all rights reserved.

namespace Qobo;

use Qobo\Framework\Container;
use Qobo\Framework\Router;

class App {
    protected static Container $container;

    public const MIDDLEWARES = [
        "guest" => \Qobo\Middlewares\Guest::class,
        "loggedIn" => \Qobo\Middlewares\LoggedIn::class,
    ];

    public static function resolveMiddleware($key, $uri, $method) {
        if (!$key) {
            return;
        }

        $middleware = static::MIDDLEWARES[$key] ?? false;

        if (!$middleware) {
            throw new \Exception("No matching middleware found");
        }

        (new $middleware)->handle($uri, $method);
    }

    private static function setContainer(Container $container) {
        static::$container = $container;
    }

    public static function container() {
        if (static::$container === null) {
            throw new \Exception("You haven't set the container!");
        };

        return static::$container;
    }

    public static function run(Container $container, Router $router) {
        // get server info
        $uri = parse_url($_SERVER["REQUEST_URI"])["path"];
        $method = $_SERVER['REQUEST_METHOD'];

        self::setContainer($container);
        $router->run($uri, $method);      
    }
}