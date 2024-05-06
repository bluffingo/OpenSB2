<?php
// Copyright Chaziz Multimedia Entertainment and Bittoco 2024, all rights reserved.

/**
 * Dependancy Injection services to use in the app.
 *
 * Put shit here you want to use in
 */

use Qobo\Framework\Container;

use Qobo\Framework\DB;
use Qobo\Framework\Auth;
use Qobo\Framework\Frontend;

$container = new Container();

$container->set(DB::class, fn () => new DB($config));
$container->set(Auth::class, fn () => new Auth((isset($_SESSION["token"]) ? $_SESSION["token"] : null)));
$container->set(Frontend::class, fn () => new Frontend());

return $container;
