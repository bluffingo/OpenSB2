<?php
/*
 * SPDX-License-Identifier: AGPL-3.0-only
 */
include $_SERVER["DOCUMENT_ROOT"] . '/../vendor/autoload.php';

use OpenSB2\App;
use OpenSB2\Helpers\Profiler;

Profiler::start();

session_name("sbsession");
session_start();

$config = include_once $_SERVER["DOCUMENT_ROOT"] . '/../config/config.php';
$container = include_once $_SERVER["DOCUMENT_ROOT"] . '/../src/Services.php';
$router = include_once $_SERVER["DOCUMENT_ROOT"] . '/../src/Routes.php';

App::run($container, $router, $config);
