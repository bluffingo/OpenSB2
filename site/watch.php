<?php
// Copyright Chaziz and Bittoco 2024, all rights reserved.

require_once dirname(__DIR__) . '/includes/init.php';

$id = $_GET["v"];

if(!$id) {
    die("This mf forgot The Id!!!! 😂😂😂😂😂😂 #YouAreStupid");
}

$submission = $db->execute("SELECT * FROM submissions where display_id = ?", [$id]);

if(!$submission) {
    die("Doesn't exist. So does the error page. Wow.");
}

$frontend->render("watch", [
    'submission' => $submission,
]);