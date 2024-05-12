<?php
// Copyright Chaziz Multimedia Entertainment and Bittoco 2024, all rights reserved.
include $_SERVER["DOCUMENT_ROOT"] . '/../vendor/autoload.php';

use Qobo\App;
use Qobo\Helpers\Profiler;

Profiler::start();

session_name("qobosession");
session_start();

$config = include_once $_SERVER["DOCUMENT_ROOT"] . '/../config/config.php';
$container = include_once $_SERVER["DOCUMENT_ROOT"] . '/../src/Services.php';
$router = include_once $_SERVER["DOCUMENT_ROOT"] . '/../src/Routes.php';

App::run($container, $router, $config);
