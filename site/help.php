<?php
// Copyright Chaziz 2024, all rights reserved.

require_once dirname(__DIR__) . '/includes/init.php';

$frontend->render("markdown", [
    'page' => 'help.md',
]);