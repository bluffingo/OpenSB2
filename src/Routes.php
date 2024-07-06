<?php
/*
 * SPDX-License-Identifier: AGPL-3.0-only
 */

/**
 * OpenSB2Framework Routing
 *
 * Each URI points to it's specfic class and that classes method.
 * for example, [ExampleController, "example_func"] would point to "example_func" in the ExampleController class
 *
 * All controllers are in ``src/Controller``. Dynamic routing still hasn't been implemented because i'm a lazy bitch
 */

use OpenSB2\Framework\Router;

use OpenSB2\Controllers\IndexController;
use OpenSB2\Controllers\MiscController;
use OpenSB2\Controllers\ViewController;
use OpenSB2\Controllers\AuthController;
use OpenSB2\Controllers\UploadController;
use OpenSB2\Controllers\ProfileController;
use OpenSB2\Controllers\SBMigrateController;
use OpenSB2\Controllers\BrowseController;
use OpenSB2\Controllers\API\PlayerController;

$router = new Router();

$router->GET("/", [IndexController::class, "index"]);

$router->GET("/help", [MiscController::class, "help"]);
$router->GET("/guidelines", [MiscController::class, "guidelines"]);
$router->GET("/privacy", [MiscController::class, "privacy"]);

$router->GET("/browse", [BrowseController::class, "browse"]);
$router->GET("/view", [ViewController::class, "view"]);
$router->GET("/profile", [ProfileController::class, "profile"]);

$router->GET("/signin", [AuthController::class, "signin"])->useMiddleware("guest");
$router->POST("/signin", [AuthController::class, "signin_post"])->useMiddleware("guest");
$router->GET("/signup", [AuthController::class, "signup"])->useMiddleware("guest");
$router->POST("/signup", [AuthController::class, "signup_post"])->useMiddleware("guest");
$router->GET("/signout", [AuthController::class, "signout"])->useMiddleware("loggedIn");

$router->GET("/upload", [UploadController::class, "upload"])->useMiddleware("loggedIn");
$router->POST("/upload", [UploadController::class, "upload_post"])->useMiddleware("loggedIn");

// TODO: remove this.
$router->GET("/api/player/get_video", [PlayerController::class, "getVideo"]);

return $router;
