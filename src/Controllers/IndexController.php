<?php
/*
 * SPDX-License-Identifier: AGPL-3.0-only
 */

namespace OpenSB2\Controllers;

use OpenSB2\Framework\Controller;

class IndexController extends Controller {
    public function index() {
        //uh, nothing.

        return $this->frontend->render("index");
    }
}
