<?php
// Copyright Chaziz Multimedia Entertainment and Bittoco 2024, all rights reserved.

namespace Qobo\Controllers;

use Qobo\Framework\Controller;

class ViewController extends Controller {
    public function view() {
        $id = $_GET["id"];

        // placeholder, this should redirect to the homepage while showing an error banner,
        // akin to vidlii and opensb.
        if (!isset($id)) {
            throw new \Exception("Missing submission id.");
        }

        $submission = $this->db->execute("SELECT * FROM submissions where display_id = ?", [$id], true);

        // ditto.
        if (!$submission) {
            throw new \Exception("This submission does not exist.");
        }

        $this->frontend->render("view", [
            'submission' => $submission,
        ]);
    }
}
