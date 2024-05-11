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
use Qobo\Controllers\UploadController;
use Qobo\Controllers\ProfileController;
use Qobo\Controllers\SBMigrateController;
use Qobo\Controllers\BrowseController;
use Qobo\Controllers\API\PlayerController;

$router = new Router();

$router->GET("/", [IndexController::class, "index"]);

$router->GET("/help.php", [MiscController::class, "help"]);
$router->GET("/guidelines.php", [MiscController::class, "guidelines"]);
$router->GET("/privacy.php", [MiscController::class, "privacy"]);

$router->GET("/browse.php", [BrowseController::class, "browse"]);
$router->GET("/view.php", [ViewController::class, "view"]);
$router->GET("/profile.php", [ProfileController::class, "profile"]);

$router->GET("/signin.php", [AuthController::class, "signin"])->useMiddleware("guest");
$router->POST("/signin.php", [AuthController::class, "signin_post"])->useMiddleware("guest");
$router->GET("/signup.php", [AuthController::class, "signup"])->useMiddleware("guest");
$router->POST("/signup.php", [AuthController::class, "signup_post"])->useMiddleware("guest");
$router->GET("/signout.php", [AuthController::class, "signout"])->useMiddleware("loggedIn");

$router->GET("/upload.php", [UploadController::class, "upload"])->useMiddleware("loggedIn");
$router->POST("/upload.php", [UploadController::class, "upload_post"])->useMiddleware("loggedIn");

if(!is_null($config["opensb_mysql"]["database"])) {
    $router->GET("/migrate.php", [SBMigrateController::class, "migrate"])->useMiddleware("loggedIn");
    $router->POST("/migrate.php", [SBMigrateController::class, "migrate_post"])->useMiddleware("loggedIn");
} else {
    $router->GET("/migrate.php", function () {
        http_response_code(400);
        echo "Migration is turned off on this instance";
    })->useMiddleware("loggedIn");
}

$router->GET("/api/player/get_video.php", [PlayerController::class, "getVideo"]);

return $router;
