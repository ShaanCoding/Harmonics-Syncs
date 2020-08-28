<?php

require_once('../include/database.php');
require_once('../include/utils.php');

/**
 * users.php
 * 
 * contains all the util functions to interact with the users database
 * 
 * @author Jacky Wu
 */

class Users
{
    
    private function GetSQL()
    {
        return $GLOBALS['db'];
    }

    /**
     * Gets all the users from the database
     * 
     * @return Array All the user functions stored as an array
     */
    public function GetAllUsers()
    {
        $sql = $this->GetSQL();
        $sql->prepare();
        $sql->execute();
        return $sql->fetchAll();
    }

}
