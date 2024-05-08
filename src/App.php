<?php
// Copyright Chaziz Multimedia Entertainment and Bittoco 2024, all rights reserved.

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

    private static function cleanup() {
        unset($_SESSION["__flash"]);
    }

    public static function container() {
        if (static::$container === null) {
            throw new \Exception("You haven't set the container!");
        };

        return static::$container;
    }

    public static function run(Container $container, Router $router) {
        try {
            static::$container = $container;
            $router->run(parse_url($_SERVER["REQUEST_URI"])["path"], $_SERVER['REQUEST_METHOD']);
        } catch (\Exception $error) {
            die('<pre>QoboFramework: Something went very wrong. Error:</pre> <pre>'. $error->getMessage() . '</pre>');
        }

        self::cleanup();
    }
}
