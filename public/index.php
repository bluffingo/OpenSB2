<?php
// Copyright Chaziz Multimedia Entertainment and Bittoco 2024, all rights reserved.
include $_SERVER["DOCUMENT_ROOT"] . '/../vendor/autoload.php';

use Qobo\App;

if (file_exists($_SERVER["DOCUMENT_ROOT"] . '/../config/config.php')) {
    $config = include_once $_SERVER["DOCUMENT_ROOT"] . '/../config/config.php';
} else {
    // security through obscurity my favourite
    throw new Exception("Something blew up! Please contact a Bittoco developer / system administrator to resolve this issue.");
}

session_name("qobosession");
session_start();

$container = include_once $_SERVER["DOCUMENT_ROOT"] . '/../src/Services.php';
$router = include_once $_SERVER["DOCUMENT_ROOT"] . '/../src/Routes.php';

App::run($container, $router);
