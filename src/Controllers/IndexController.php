<?php
// Copyright Chaziz Multimedia Entertainment and Bittoco 2024, all rights reserved.

namespace OpenSB2\Controllers;

use OpenSB2\Framework\Controller;

class IndexController extends Controller {
    public function index() {
        //uh, nothing.

        return $this->frontend->render("index");
    }
}
