<?php
// Copyright Bluffingo 2024, all rights reserved.

define("QOBO_ROOT", dirname(__DIR__));

include QOBO_ROOT . '/vendor/autoload.php';

$loaded_classes = [];

spl_autoload_register(function ($class_name) {
    global $loaded_classes;
    $class_name = str_replace('\\', '/', $class_name);
    include QOBO_ROOT . '/includes/classes/' . $class_name . '.php';
    $loaded_classes[] = $class_name;
});

$db = new DB;
$frontend = new Frontend;