<?php
// Copyright Chaziz Multimedia Entertainment and Bittoco 2024, all rights reserved.

namespace Qobo\Controllers;

use Qobo\Framework\Controller;

class BrowseController extends Controller {
    public function browse() {
        // TODO: PAGINATION

        $category = $_GET["category"];

        $submissions = $this->db->execute("SELECT * FROM submissions where type = ? LIMIT 12", [$category]);

        return $this->frontend->render("browse", [
            'submissions' => $submissions,
        ]);
    }
}