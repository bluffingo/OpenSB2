<?php
// Copyright Chaziz Multimedia Entertainment and Bittoco 2024, all rights reserved.

namespace Qobo\Controllers;

use Qobo\Framework\Controller;

// this is for xml stuff.
class XMLController extends Controller {
    // returns dummy data.
    public function getVideoForFlash() {
        $id = $_GET["id"]; // the flash player currently hardcodes this to "test".

        // TODOS:
        // 1. don't hardcode the domain, i know there's a way but i don't care right now.
        // 2. db query.
        // -chaziz 5/9/2024

        $data = [
            "title" => "Hello, world!",
            "file" => "http://qobo.tv/dynamic/testing.flv",
        ];

        echo $this->returnXML($data);
    }
}
