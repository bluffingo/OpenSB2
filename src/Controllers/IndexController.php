<?php
// Copyright Chaziz Multimedia Entertainment and Bittoco 2024, all rights reserved.

namespace Qobo\Controllers;

use Qobo\Framework\Controller;

class IndexController extends Controller {
    public function index() {
        $submissions = $this->db->execute("SELECT * FROM submissions LIMIT 10");

        return $this->frontend->render("index", [
            'submissions' => $submissions,
        ]);
    }
}