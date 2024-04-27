<?php
// Copyright Chaziz 2024, all rights reserved.

class DB
{
    private $db;
    private $allQueries;
    function __construct()
    {
        // TODO: configuration file
        $database = 'sb'; // don't use opensb-style dbs, they won't be compatible.
        $ip = '127.0.0.1';
        $user = 'root';
        $password = '';

        $connection = 'mysql:dbname=' . $database . ';host=' . $ip;

        $this->allQueries = [];

        try {
            $this->db = new PDO($connection, $user, $password);
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