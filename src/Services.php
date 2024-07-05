<?php
// Copyright Chaziz Multimedia Entertainment and Bittoco 2024, all rights reserved.

/**
 * Dependancy Injection services to use in the app.
 *
 * Put shit here you want to use in
 */

use OpenSB2\Framework\Container;

use OpenSB2\Framework\DB;
use OpenSB2\Framework\Auth;
use OpenSB2\Framework\Frontend;

$container = new Container();

$container->set(DB::class, fn () => new DB($config["mysql"]));
$container->set(Auth::class, fn () => new Auth((isset($_SESSION["token"]) ? $_SESSION["token"] : null)));
$container->set(Frontend::class, fn () => new Frontend());

// sorry if this is shit -chaziz 5/7/2024
if(!is_null($config["opensb_mysql"]["database"])) {
    $container->set("sb_db", fn () => new DB($config["opensb_mysql"]));
}

return $container;
