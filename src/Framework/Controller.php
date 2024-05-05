<?php
// Copyright Chaziz, RGB and Bittoco 2024, all rights reserved.

namespace Qobo\Framework;

use Qobo\App;
use Qobo\Framework\DB;
use Qobo\Framework\Frontend;

/**
 * QoboFramework Controller.
 * 
 * This is a base class that you can extend to make a valid controller for your route.
 * @author RGB
 */
class Controller {
    public $db;
    public $frontend;
    
    public function __construct() {
        $this->db = App::container()->get(DB::class);
        $this->frontend = App::container()->get(Frontend::class);
    }

    public function returnJSON(object $data) {
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function redirect(string $url) {
        header("Location: " . $url);
        return;
    }
}