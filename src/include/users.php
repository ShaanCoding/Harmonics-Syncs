<?php

/**
 * users.php
 * 
 * contains all the util functions to interact with the users database
 * 
 * @author Jacky Wu
 */

require_once('../include/database.php');

class Users
{
    /**
     * Gets all the users from the database
     * 
     * @return Array All the user functions stored as an array
     */
    public function GetAllUsers()
    {
        $sql = $GLOBALS['db'];
        $get_users = $sql->prepare('SELECT * FROM users');
        $get_users->execute();
        return $get_users->fetchAll();
    }

}
