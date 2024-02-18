<?php
// Copyright Bluffingo 2024, all rights reserved.

class DB {
    function __construct() {
        // TODO: configuration file
        $database = 'qobo_development'; // this is not compatible with opensb databases.
        $ip = '127.0.0.1';
        $user = 'root';
        $password = '';

        $connection = 'mysql:dbname='.$database.';host='.$ip;

        $dbh = new PDO($connection, $user, $password);
    }
}