<?php
// Copyright Chaziz Multimedia Entertainment and Bittoco 2024, all rights reserved.

namespace Qobo\Framework;

use Qobo\App;
use Qobo\Framework\DB;

class Auth {
    private $db;
    private $token;
    private $loggedin;
    private $data;
    private $id;

    function __construct($token) {
        $this->db = App::container()->get(DB::class);
        $this->loggedin = false;
        $this->id = 0;

        if ($token) {
            $this->token = $token;

            $id = $this->db->execute("SELECT id FROM users WHERE token = ?", [$this->token], true)["id"];

            if ($id) {
                $this->loggedin = true;
                $this->id = $id;
            } else {
                echo("Invalid token!");
                session_destroy();
            }
        }

        if($this->loggedin) {
            $this->data = $this->db->execute("SELECT * FROM users WHERE id = ?", [$this->id], true);
        }
    }

    public function isLoggedIn() {
        return $this->loggedin;
    }

    public function getUserData() {
        return $this->data;
    }
}