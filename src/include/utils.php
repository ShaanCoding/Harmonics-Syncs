<?php

/**
 * Returns the PDO connection for database queries
 */
function GetSQL()
{
    return $GLOBALS['db'];
}

/* Hacks for XAMPP and later php versions */

/**
 * Validates any variable
 * 
 * @param any $var any varialbe
 * 
 * @return boolean whether the variable is valid or not
 */
function ValidInput($var)
{
    return (isset($var) && $var) ? true : false;
}

/**
 * Returns a valid variable from POST
 * 
 * @param string $var name of the variable from POST
 * 
 * @return any the variable from POST if exists
 */
function ValidPost($var)
{
    return isset($_POST[$var]) ? $_POST[$var] : '';
}

/**
 * Returns a valid variable from GET
 * 
 * @param string $var name of the variable from GET
 * 
 * @return any the variable from GET if exists
 */
function ValidGet($var)
{
    return isset($_GET[$var]) ? $_GET[$var] : '';
}

/**
 * Returns a valid variable from the session
 * 
 * @param $var name of the variable in the session
 * 
 * @return any the variable found in session if exists
 */
function ValidSession($var)
{
    return isset($_SESSION[$var]) ? $_SESSION[$var] : '';
}
