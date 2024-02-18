<?php
// Copyright Bluffingo 2024, all rights reserved.

class Auth {
    private $db;
    private $token;
    private $loggedin;
    private $data;
    private $id;
    function __construct(DB $db, $token) {
        $this->db = $db;
        $this->loggedin = false;
        $this->id = 0;

        if ($token) {
            $this->token = $token;

            $id = $db->execute("SELECT id FROM users WHERE token = ?", [$this->token], true)["id"];

            if ($id) {
                $this->loggedin = true;
                $this->id = $id;
            } else {
                echo("Invalid token!");
                session_destroy();
            }
        }

        if($this->loggedin) {
            $this->data = $db->execute("SELECT * FROM users WHERE id = ?", [$this->id], true);
        }
    }

    public function isLoggedIn() {
        return $this->loggedin;
    }

    public function getUserData() {
        return $this->data;
    }
}