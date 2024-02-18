<?php
// Copyright Bluffingo 2024, all rights reserved.

require_once dirname(__DIR__) . '/includes/init.php';

// don't begin work on proper frontend just yet. prototype the features first.
// this won't replace opensb for a while.

$submissions = $db->execute("SELECT * FROM submissions LIMIT 10");

$frontend->render("index", [
    'submissions' => $submissions,
]);