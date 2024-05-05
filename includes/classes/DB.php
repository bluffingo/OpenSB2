<?php
// Copyright Chaziz, RGB and Bittoco 2024, all rights reserved.

class DB
{
    private $db;
    private $allQueries;

    function __construct($config)
    {
        $connection = 'mysql:dbname=' . $config["mysql"]["database"] . ';host=' . $config["mysql"]["host"];

        $this->allQueries = [];

        try {
            $this->db = new PDO($connection, $config["mysql"]["username"], $config["mysql"]["password"]);
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