<?php
/*
 * SPDX-License-Identifier: AGPL-3.0-only
 */

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

return $container;
