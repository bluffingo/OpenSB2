<?php
// Copyright Bluffingo 2024, all rights reserved.

class Frontend {
    private $twig;

    function __construct() {
        $loader = new \Twig\Loader\FilesystemLoader(QOBO_ROOT . '/templates/decoy/');
        $this->twig = new \Twig\Environment($loader);
    }

    function render($name, $array = []) {
        $template = $this->twig->load($name . '.twig');
        echo $template->render($array);
    }
}