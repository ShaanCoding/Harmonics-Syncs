<?php

/**
 * API point for registrations
 * 
 * Method Id: 1
 * name: name
 * user: username
 * pass: password
 * roles: roless
 * instrument: instrument
 * gender: gender
 * bio: bio
 * pfp: pfp
 * genre: genre
 * songs: songs
 * level: level (beginner etc)
 */

 require_once("../include/users.php");

$name = ValidGet("name");
$username = ValidGet("user");
$password = ValidGet("pass");
$roles = ValidGet("roles");
$instrument = ValidGet("instrument");
$gender = ValidGet("gender");
$bio = ValidGet("bio");
$pfp = ValidGet("pfp");
$genre = ValidGet("genre");
$songs = ValidGet("songs");
$level = ValidGet("level");

/* realistically on release we just want to return invalid 
   but this will do us for now. */

if (!ValidInput($username)) {
    die("Username not set");
}

/* Shaan i'll implement your password algorithm later... */

if (!ValidInput($password)) {
    die("Password not set");
}

if (!ValidInput($roles)) {
    die("Roles not set");
}

if (!ValidInput($instrument)) {
    die("Instrument not set");
}

if (!ValidInput($gender)) {
    die("Gender not set");
}

if (!ValidInput($pfp)) {
    die("Profile not set");
}

if (!ValidInput($genre)) {
    die("Genre not set");
}

if (!ValidInput($songs)) {
    die("Songs not set");
}

if (!ValidInput($level)) {
    die("Level not set");
}

// to-do 
// verify that certain inputs are json decodable

// check if user account does not already exist

$user_db = new Users;

$user_check = $user_db->GetUserFromUsername($username);

if (ValidInput($user_check)) {
    die("Username already taken");
}

// create the account

$user_db->AddUser($name, $username, $password, $roles, $instrument, $gender, $bio, $pfp, $genre, $songs, $level);

die("success");





/*  Ignore this for now.

        if(!usernameValidation($userName) && strlen($userName) > 0)
        {
            echo "The username must have only numbers, letters and underscores, no additional characters </br>";
        }

        if(!nameValidation($name) && strlen($name) > 0)
        {
            echo "The name is incorrect, must only contains letters a-z with capitals and or spaces </br>";
        }

        if(!passwordValidation($password) && strlen($password) > 0)
        {
            echo "The password is incorrect, length must be greater than or equal to five, contain at least one uppercase letter and at least one number OR symbol </br>";
        }

        function usernameValidation($userName)
        {
            //Restricts username to having numbers, letters & underscores
            return preg_match('/[^a-zA-Z0-9_]/', $userName) == 0;
        }

        function nameValidation($name)
        {
            //Restricts to just a-z with capitals and spaces
            return preg_match("/^([a-zA-Z' ]+)$/", $name);
        }

        function passwordValidation($password)
        {
            //Returns a true or false statement dependent if the password is valid or not
            //Password >= 5
            //include uppercase, numbers OR symbols
            return (strlen($password) >= 5 && preg_match('/[A-Z]/', $password) &&
                    (preg_match('/\d/', $password) || preg_match('/[^a-zA-Z\d]/', $password)));
        }
*/
