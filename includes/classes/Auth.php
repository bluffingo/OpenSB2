<?php
// Copyright Bluffingo 2024, all rights reserved.

class Auth {
    private $db;
    private $token;
    private $loggedin;
    function __construct(DB $db, $token) {
        $this->db = $db;
        $this->loggedin = false;

        if ($token) {
            $this->token = $token;

            $id = $db->execute("SELECT id FROM users WHERE token = ?", [$this->token], true);

            if ($id) {
                $this->loggedin = true;
            } else {
                echo("Invalid token!");
                session_destroy();
                $this->loggedin = false;
            }
        }
    }

    public function isLoggedIn() {
        return $this->loggedin;
    }
}