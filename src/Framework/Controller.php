<?php
// Copyright Chaziz Multimedia Entertainment and Bittoco 2024, all rights reserved.

namespace OpenSB2\Framework;

use \SimpleXMLElement;

use OpenSB2\App;
use OpenSB2\Helpers\XML;
use OpenSB2\Framework\DB;
use OpenSB2\Framework\Frontend;

/**
 * QoboFramework Controller.
 *
 * This is a base class that you can extend to make a valid controller for your route.
 * @author RGB
 */
class Controller {
    public $db;
    public $frontend;
    public $sbdb;
    public $appConfig;

    public function __construct() {
        $this->db = App::container()->get(DB::class);
        $this->frontend = App::container()->get(Frontend::class);
        $this->appConfig = App::config();

        // this is shit. i know. -chaziz 5/7/2024
        try {
            $this->sbdb = App::container()->get("sb_db");
        } catch (\Exception $e) {
            $this->sbdb = null;
        }

    }

    public function returnJSON(object $data) {
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function returnXML($data) {
        header('Content-Type: application/xml');

        $xml_data = new SimpleXMLElement('<?xml version="1.0"?><data></data>');
        XML::arrayToXML($data, $xml_data);

        return $xml_data->asXML();
    }

    public function redirect(string $url) {
        header("Location: " . $url);
        return;
    }
}
