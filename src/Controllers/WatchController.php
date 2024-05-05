<?php
// Copyright Chaziz, RGB and Bittoco 2024, all rights reserved.

namespace Qobo\Controllers;

use Qobo\Framework\Controller;

class WatchController extends Controller {
    public function watch() {
        $id = $_GET["v"];

        if (!$id) {
            die("This mf forgot The Id!!!! 😂😂😂😂😂😂 #YouAreStupid");
        }

        $submission = $this->db->execute("SELECT * FROM submissions where display_id = ?", [$id]);

        if (!$submission) {
            die("Doesn't exist. So does the error page. Wow.");
        }

        $this->frontend->render("watch", [
            'submission' => $submission,
        ]);
    }
}