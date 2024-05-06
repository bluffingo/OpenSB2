<?php
// Copyright Chaziz Multimedia Entertainment and Bittoco 2024, all rights reserved.

namespace Qobo\Controllers;

use Qobo\Framework\Controller;

class ViewController extends Controller {
    public function view() {
        $id = $_GET["id"];

        if (!isset($id)) {
            die("This mf forgot The Id!!!! 😂😂😂😂😂😂 #YouAreStupid");
        }

        $submission = $this->db->execute("SELECT * FROM submissions where display_id = ?", [$id], true);

        if (!$submission) {
            die("Doesn't exist. So does the error page. Wow.");
        }

        $this->frontend->render("view", [
            'submission' => $submission,
        ]);
    }
}
