<?php

require_once("../include/database.php");
require_once("../include/utils.php");

$method_signup = 1;
$method_login = 2;
$method_swipe = 3;

$method = ValidGet('m');

switch ($method) {
    case $method_signup: {
            require 'signup.php';
        }
        break;

    case $method_login: {
            require 'login.php';
        }
        break;

    case $method_swipe: {
            require 'swipes.php';
        }
        break;
}
