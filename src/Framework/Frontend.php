<?php
// Copyright Chaziz Multimedia Entertainment and Bittoco 2024, all rights reserved.

namespace Qobo\Framework;

use Qobo\App;
use Qobo\Framework\FrontendTwigExtension;
use Qobo\Framework\DB;
use Qobo\Framework\Auth;

class Frontend {
    private $twig;
    private $db;
    private $auth;

    function __construct() {
        $loader = new \Twig\Loader\FilesystemLoader($_SERVER["DOCUMENT_ROOT"] . '/../src/templates/qobo/');
        
        $this->twig = new \Twig\Environment($loader);
        $this->twig->addExtension(new FrontendTwigExtension());

        $this->db = App::container()->get(DB::class);
        $this->auth = App::container()->get(Auth::class);

        $this->twig->addGlobal('loggedIn', $this->auth->isLoggedIn());
        $this->twig->addGlobal('userData', $this->auth->getUserData());
    }

    function render($name, $array = []) {
        $template = $this->twig->load($name . '.twig');
        echo $template->render($array);
        print_r($this->db->getAllQueries());
    }
}