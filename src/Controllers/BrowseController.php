<?php
/*
 * SPDX-License-Identifier: AGPL-3.0-only
 */

namespace OpenSB2\Controllers;

use OpenSB2\Framework\Controller;

class BrowseController extends Controller {
    public function browse() {
        // TODO: PAGINATION

        $category = $_GET["category"] ?? null;

        if ($category == null) {
            throw new \Exception("Invalid catagory");
        }

        // todo: validation

        $submissions = $this->db->execute("SELECT * FROM submissions where type = ? LIMIT 12", [$category]);

        return $this->frontend->render("browse", [
            'submissions' => $submissions,
            'catagory' => $category,
        ]);
    }
}
