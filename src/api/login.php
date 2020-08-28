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

 $username = ValidGet("user");
 $password = ValidGet("pass");

 if (!ValidInput($username)) {
     die("Username required");
 }

 if (!ValidInput($password)) {
     die("Password required");
 }

 $user_db = new Users;
 $stored_user = $user_db->GetUserFromUsername($username);

if (!ValidInput($stored_user)) {
    die("User does not exist");
}

/* compare password */

if (!password_verify($password, $stored_user['password'])) {
    die("Password mismatch");
}

/* Check existing session? */

