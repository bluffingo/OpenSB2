<?php
/*
 * SPDX-License-Identifier: AGPL-3.0-only
 */

namespace OpenSB2\Controllers;

use OpenSB2\Framework\Controller;

class UploadController extends Controller {
    public function upload() {
        return $this->frontend->render("upload");
    }

    public function upload_post() {
        // TODO: queue
        throw new \Exception("This is currently not implemented.");
    }
}
