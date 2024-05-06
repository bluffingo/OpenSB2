<?php
// Copyright Chaziz Multimedia Entertainment and Bittoco 2024, all rights reserved.

/**
 * QoboFramework Routing
 *
 * Each URI points to it's specfic class and that classes method.
 * for example, [ExampleController, "example_func"] would point to "example_func" in the ExampleController class
 *
 * All controllers are in ``src/Controller``. Dynamic routing still hasn't been implemented because i'm a lazy bitch
 */

use Qobo\Framework\Router;

use Qobo\Controllers\IndexController;
use Qobo\Controllers\MiscController;
use Qobo\Controllers\ViewController;
use Qobo\Controllers\AuthController;

$router = new Router();

$router->GET("/", [IndexController::class, "index"]);

$router->GET("/help.php", [MiscController::class, "help"]);
$router->GET("/guidelines.php", [MiscController::class, "guidelines"]);
$router->GET("/privacy.php", [MiscController::class, "privacy"]);

$router->GET("/view.php", [ViewController::class, "view"]);

$router->GET("/signin.php", [AuthController::class, "signin"])->useMiddleware("guest");
$router->POST("/signin.php", [AuthController::class, "signin_post"])->useMiddleware("guest");
$router->GET("/signup.php", [AuthController::class, "signup"])->useMiddleware("guest");
$router->POST("/signup.php", [AuthController::class, "signup_post"])->useMiddleware("guest");
$router->GET("/signout.php", [AuthController::class, "signout"])->useMiddleware("loggedIn");

return $router;
