<?php
// Copyright Chaziz Multimedia Entertainment and Bittoco 2024, all rights reserved.

return [
    // Database details. (Qobo only supports MySQL / MariaDB databases)
    "mysql" => [
        "database" => "sb",
        "username" => "",
        "password" => "",
        "host" => "127.0.0.1",
    ],
    // Database details for OpenSB databases. (this is for migration, it'll be removed once deadline occurs)
    "opensb_mysql" => [
        "database" => "",
        "username" => "",
        "password" => "",
        "host" => "127.0.0.1",
    ],
    // TODO: Use this for something.
    "mode" => "PROD"
];