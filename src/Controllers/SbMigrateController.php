<?php
// Copyright Chaziz Multimedia Entertainment and Bittoco 2024, all rights reserved.

namespace Qobo\Controllers;

use Qobo\Framework\Controller;

class SbMigrateController extends Controller {
    public function migrate() {
        return $this->frontend->render("migrate");
    }

    public function migrate_post() {
        throw new \Exception("This is currently not implemented. (let chaziz do it)");
    }
}