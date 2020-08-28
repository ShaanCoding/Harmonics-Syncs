<?php

/**
 * users.php
 * 
 * contains all the util functions to interact with the users database
 * 
 * @author Jacky Wu
 */

 require_once("database.php");

class Genres
{
    /**
     * Gets all the users from the database
     * 
     * @return Array All the user functions stored as an array
     */
    public function GetAllGenres()
    {
        $sql = $GLOBALS['db'];
        $get_genres = $sql->prepare('SELECT * FROM genres');
        $get_genres->execute();
        return $get_genres->fetchAll();
    }

}
