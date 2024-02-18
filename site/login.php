<?php
// Copyright Bluffingo 2024, all rights reserved.

require_once dirname(__DIR__) . '/includes/init.php';

if ($auth->isLoggedIn()) {
    die("Already logged in.");
}

if (isset($_POST["field_command"])) {
    $username = (isset($_POST['field_login_username']) ? $_POST['field_login_username'] : null);
    $password = (isset($_POST['field_login_password']) ? $_POST['field_login_password'] : null);

    $login = $db->execute("SELECT id,passhash,token FROM users WHERE name = ?", [$username], true);

    if (!isset($username) || !isset($password) || !isset($login) || !password_verify($password, $login['passhash'])) {
        die("Incorrect username or password.");
    } else {
        $_SESSION['token'] = $login['token'];
    }
}

$frontend->render("login");