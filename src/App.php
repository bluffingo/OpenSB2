<?php
// Copyright Chaziz Multimedia Entertainment and Bittoco 2024, all rights reserved.

namespace OpenSB2;

use OpenSB2\Framework\Container;
use OpenSB2\Framework\Router;
use OpenSB2\Helpers\Profiler;

class App {
    protected static Container $container;
    protected static array $config;

    public const MIDDLEWARES = [
        "guest" => \OpenSB2\Middlewares\Guest::class,
        "loggedIn" => \OpenSB2\Middlewares\LoggedIn::class,
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

        if (self::$config["mode"] == "DEV") {
            Profiler::getInfo();
        }
    }

    public static function container() {
        if (static::$container === null) {
            throw new \Exception("You haven't set the container!");
        };

        return static::$container;
    }

    public static function config() {
        if (static::$config === null) {
            throw new \Exception("You haven't set the app config!");
        }

        return static::$config;
    }

    public static function run(Container $container, Router $router, array $config) {
        try {
            static::$container = $container;
            static::$config = $config;

            $router->run(parse_url($_SERVER["REQUEST_URI"])["path"], $_SERVER['REQUEST_METHOD']);
        } catch (\Exception $error) {
            die('<pre>QoboFramework: Something went very wrong. Error:</pre> <pre>'. $error->getMessage() . '</pre>');
        }

        self::cleanup();
    }
}
