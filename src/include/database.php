<?php

/**
 * Contains the configuration and setup for the database
 * note: don't actually push the localhost login information
 * 
 * @author Jacky Wu
 * 
 */

define("SERVER", "localhost");

/* determines if the current configuration is live */
define("RELEASE", false);


/* enter credentials here */
define("DB_USER", "...");
define("DB_PASS", "...");

/* database name here */
define("DB_NAME", "");

/* attempt to connect to database, if unsuccessful throw an error */
try {
    $GLOBALS['db'] = new PDO('mysql:host=' . SERVER . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
} catch (PDOException $e) {
    die("");
}
