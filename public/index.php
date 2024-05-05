<?php
// Copyright Chaziz, RGB and Bittoco 2024, all rights reserved.
include $_SERVER["DOCUMENT_ROOT"] . '../vendor/autoload.php';

use Qobo\App;

use Qobo\Framework\Router;
use Qobo\Framework\Container;
use Qobo\Framework\DB;
use Qobo\Framework\Auth;
use Qobo\Framework\Frontend;

use Qobo\Controllers\IndexController;
use Qobo\Controllers\MiscController;
use Qobo\Controllers\WatchController;
use Qobo\Controllers\AuthController;

if (file_exists($_SERVER["DOCUMENT_ROOT"] . '../config/config.php')) {
    $config = include $_SERVER["DOCUMENT_ROOT"] . '../config/config.php';
} else {
    // security through obscurity my favourite
    throw new Exception("Something blew up! Please contact a Bittoco developer / system administrator to resolve this issue.");
}

session_name("qobosession");
session_start();

$container = new Container();
$router = new Router();

$container->set(DB::class, fn () => new DB($config));

$container->set(Auth::class, function () {
    return new Auth((isset($_SESSION["token"]) ? $_SESSION["token"] : null));
});

$container->set(Frontend::class, fn () => new Frontend());

$router->GET("/", [IndexController::class, "index"]);

$router->GET("/help.php", [MiscController::class, "help"]);
$router->GET("/guidelines.php", [MiscController::class, "guidelines"]);
$router->GET("/privacy.php", [MiscController::class, "privacy"]);

$router->GET("/watch.php", [WatchController::class, "watch"]);

$router->GET("/signin.php", [AuthController::class, "signin"])->useMiddleware("guest");
$router->POST("/signin.php", [AuthController::class, "signin_post"])->useMiddleware("guest");
$router->GET("/signup.php", [AuthController::class, "signup"])->useMiddleware("guest");
$router->POST("/signup.php", [AuthController::class, "signup_post"])->useMiddleware("guest");
$router->GET("/signout.php", [AuthController::class, "signout"])->useMiddleware("loggedIn");

App::run($container, $router);