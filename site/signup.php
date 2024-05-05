<?php
// Copyright Chaziz and Bittoco 2024, all rights reserved.

require_once dirname(__DIR__) . '/includes/init.php';

if ($auth->isLoggedIn()) {
    die("Already logged in.");
}

//$invite_key = "123";

if (isset($_POST["field_command"])) {
    $username = (isset($_POST['field_signup_username']) ? $_POST['field_signup_username'] : null);
    $pass1 = (isset($_POST['field_signup_password_1']) ? $_POST['field_signup_password_1'] : null);
    $pass2 = (isset($_POST['field_signup_password_2']) ? $_POST['field_signup_password_2'] : null);
    $mail = (isset($_POST['field_signup_email']) ? $_POST['field_signup_email'] : null);
    $invite = (isset($_POST['field_signup_invite_key']) ? $_POST['field_signup_invite_key'] : null);


    // Check if username is alphanumeric and set
    if (!isset($username) || !ctype_alnum($username)) {
        die("Invalid username");
    }

    // Check if password fields are set and meet minimum length requirement
    if (!isset($pass1) || strlen($pass1) < 8 || !isset($pass2) || $pass1 != $pass2) {
        die("Invalid password");
    }

    // Check if email is set and valid
    if (!isset($mail) || !filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email");
    }

    //// Check if invite key matches
    //if ($invite !== $invite_key) {
    //    die("Wrong or no invite key inputted.");
    //}

    $why_the_fuck_is_this_like_this = $db->execute("SELECT count(*) FROM users WHERE name = ?", [$username], true);

    if ($why_the_fuck_is_this_like_this["count(*)"] > 0) {
        die("This username has already been taken.");
    }

    $token = bin2hex(random_bytes(50)); // has to be half of the maximum length (100) or it fucks shit up.
    $submissions = $db->execute("
    INSERT INTO users (name, email, passhash, joined, token) VALUES (?,?,?,?,?)
    ", [$username, $mail, password_hash($pass1, PASSWORD_DEFAULT), time(), $token]);

    $_SESSION['token'] = $token;
}

$frontend->render("signup");