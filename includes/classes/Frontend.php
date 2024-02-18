<?php
// Copyright Bluffingo 2024, all rights reserved.

class Frontend {
    private $twig;
    private $db;
    private $auth;

    function __construct($db, $auth) {
        $loader = new \Twig\Loader\FilesystemLoader(QOBO_ROOT . '/templates/decoy/');
        $this->twig = new \Twig\Environment($loader);
        $this->twig->addExtension(new FrontendTwigExtension());

        $this->db = $db;
        $this->auth = $auth;

        $this->twig->addGlobal('loggedIn', $this->auth->isLoggedIn());
        $this->twig->addGlobal('userData', $this->auth->getUserData());
    }

    function render($name, $array = []) {
        $template = $this->twig->load($name . '.twig');
        echo $template->render($array);
        print_r($this->db->getAllQueries());
    }
}