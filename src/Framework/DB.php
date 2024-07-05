<?php
// Copyright Chaziz Multimedia Entertainment and Bittoco 2024, all rights reserved.

namespace OpenSB2\Framework;

use PDO;
use PDOException;

class DB
{
    private $db;
    private $allQueries;

    function __construct($config)
    {
        $connection = 'mysql:dbname=' . $config["database"] . ';host=' . $config["host"];

        $this->allQueries = [];

        try {
            $this->db = new PDO($connection, $config["username"], $config["password"]);
        } catch (PDOException $e) {
            die('DB fail: ' . $e);
        }
    }

    public function execute($query, $params = [], $single = false)
    {
        try {
            $result = $this->db->prepare($query);
            $this->allQueries[] = $result->queryString;
            $result->execute($params);
        } catch (PDOException $e) {
            die('DB execute fail: ' . $e);
        }

        $rows = $result->rowCount();

        if(!$rows) {
            return [];
        } elseif ($single) {
            return $result->fetch(PDO::FETCH_ASSOC);
        } else {
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    public function getAllQueries()
    {
        return $this->allQueries;
    }
}
