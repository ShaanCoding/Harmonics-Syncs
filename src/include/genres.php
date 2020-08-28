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

    /**
     * Adds a new tag to the database
     */
    public function AddGenre($name)
    {
        $sql = $GLOBALS['db'];
        $add_genre = $sql->prepare('INSERT INTO genres (tag, active) VALUES (:tag, :active)');
        $add_genre->bindValue(':tag', $name);
        $add_genre->bindValue(':active', 1);
        $add_genre->execute();
    }

    /**
     * Sets the state of a tag to be active or false
     */
    public function ToggleGenre($id, $state)
    {
        $sql = $GLOBALS['db'];
        $set_genre = $sql->prepare('UPDATE genres SET active=:active WHERE id=:id');
        $set_genre->bindValue(':active', $state ? 1 : 0);
        $set_genre->bindValue(':id', $id);
        $set_genre->execute();
    }
    
}
