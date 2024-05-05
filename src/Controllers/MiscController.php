<?php
// Copyright Chaziz, RGB and Bittoco 2024, all rights reserved.

namespace Qobo\Controllers;

use Qobo\Framework\Controller;

class MiscController extends Controller {
    public function privacy() {
        return $this->frontend->render("markdown", [
            'page' => 'privacy.md',
        ]);
    }

    public function help() {
        return $this->frontend->render("markdown", [
            'page' => 'help.md',
        ]);
    }

    public function guidelines() {
        return $this->frontend->render("markdown", [
            'page' => 'guidelines.md',
        ]);
    }
}