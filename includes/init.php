<?php
// Copyright Bluffingo 2024, all rights reserved.

define("QOBO_ROOT", dirname(__DIR__));

$loaded_classes = [];

spl_autoload_register(function ($class_name) {
    global $loaded_classes;
    $class_name = str_replace('\\', '/', $class_name);
    include QOBO_ROOT . '/includes/classes/' . $class_name . '.php';
    $loaded_classes[] = $class_name;
});

$database = new DB;

var_dump($loaded_classes);

?>