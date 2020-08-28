<?php

/**
 * API point for login & session creation
 * 
 * method id: 2
 * 
 * user: username
 * pass: password
 * 
 * @author Jacky Wu
 */

require_once("../include/users.php");
require_once("../include/sessions.php");

$user_db = new Users;
$session_db = new Sessions;
$username = ValidGet("user");
$password = ValidGet("pass");

if (!ValidInput($username)) {
    die("Username required");
}

if (!ValidInput($password)) {
    die("Password required");
}

$stored_user = $user_db->GetUserFromUsername($username);

if (!ValidInput($stored_user)) {
    die("User does not exist");
}

/* compare password */

if (!password_verify($password, $stored_user['password'])) {
    die("Password mismatch");
}

/* find all previous active sessions and disable them, then create a new one */
$all_sessions = $session_db->ValidateSessions($stored_user['id']);

/* add a new session and set it */
$session_db->CreateSession($stored_user['id'], GetIPAddress());
$_SESSION[$session_db->TOKEN_NAME] = Sessions::GenerateToken();

die("success");