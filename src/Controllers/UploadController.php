<?php
// Copyright Chaziz Multimedia Entertainment and Bittoco 2024, all rights reserved.

namespace Qobo\Controllers;

use Qobo\Framework\Controller;

class UploadController extends Controller {
    public function upload() {
        return $this->frontend->render("upload");
    }

    public function upload_post() {
        // TODO: queue
        throw new \Exception("This is currently not implemented.");
    }
}