<?php
// Copyright Chaziz, RGB and Bittoco 2024, all rights reserved.

define("QOBO_ROOT", dirname(__DIR__));

include QOBO_ROOT . '/vendor/autoload.php';

if (file_exists(QOBO_ROOT . '/config/config.php')) {
    include QOBO_ROOT . '/config/config.php';
} else {
    // security through obscurity my favourite
    throw new Exception("Something blew up! Please contact a Bittoco developer / system administrator to resolve this issue.");
}

$loaded_classes = [];

// composer can do this for us aaaa - rgb
spl_autoload_register(function ($class_name) {
    global $loaded_classes;
    $class_name = str_replace('\\', '/', $class_name);
    include QOBO_ROOT . '/includes/classes/' . $class_name . '.php';
    $loaded_classes[] = $class_name;
});

session_name("qobosession");
session_start();

$db = new DB($config);
$auth = new Auth($db, (isset($_SESSION['token']) ? $_SESSION['token'] : null));

$frontend = new Frontend($db, $auth);