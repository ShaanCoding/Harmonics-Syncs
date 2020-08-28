<?php

/**
 * users.php
 * 
 * contains all the util functions to interact with the users database
 * 
 * @author Shaan Khan
 */

require_once('../include/database.php');

class Matches
{
    //Returns @return Array
    public function GetAllMatches()
    {
        $sql = $GLOBALS['db'];
        $get_users = $sql->prepare('SELECT * FROM matches');
        $get_users->execute();
        return $get_users->fetchAll();
    }

    public function AddMatches($user1, $user2, $active)
    {
        $sql = $GLOBALS['db'];
        $add_match = $sql->prepare('INSERT INTO matches (user1, user2, active) VALUES (:user1, :user2, :active)');
        $add_match->bindValue(':user1', $user1);
        $add_match->bindValue(':user2', $user2);
        $add_match->bindValue(':active', $active);
        $add_match->execute();
    }

    public function EditActiveState($id, $active)
    {
        $sql = $GLOBALS['db'];
        $update_activestate = $sql->prepare('UPDATE matches SET active=:active where id=:id');
        $update_activestate->bindValue(':active', $active);
        $update_activestate->bindValue(':id', $id);
        $update_activestate->execute();

    }
}


?>