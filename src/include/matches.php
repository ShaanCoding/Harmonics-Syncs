<?php

/**
 * users.php
 * 
 * contains all the util functions to interact with the users database
 * 
 * @author Shaan Khan
 */

require_once('../include/database.php');
require_once('../include/utils.php');

class Matches
{
    public function GetAllMatches()
    {
        $sql = $GLOBALS['db'];
        $get_users = $sql->prepare('SELECT * FROM matches');
        $get_users->execute();
        return $get_users->fetchAll();
    }

    public function AddMatch($user1, $user2)
    {
        $sql = $GLOBALS['db'];
        $add_match = $sql->prepare('INSERT INTO matches (user1, user2, active) VALUES (:user1, :user2, :active)');
        $add_match->bindValue(':user1', $user1);
        $add_match->bindValue(':user2', $user2);
        $add_match->bindValue(':active', 1); // default active
        $add_match->execute();
    }

    public function ToggleMatch($id, $state)
    {
        $sql = $GLOBALS['db'];
        $update_activestate = $sql->prepare('UPDATE matches SET active=:active where id=:id');
        $update_activestate->bindValue(':active', $state ? 1 : 0);
        $update_activestate->bindValue(':id', $id);
        $update_activestate->execute();
    }

    public function GetMatchFromId($id)
    {
        $sql = $GLOBALS['db'];
        $get_match = $sql->prepare('SELECT * FROM matches WHERE id=:id');
        $get_match->bindValue(':id', $id);
        $get_match->execute();
        return $get_match->fetch();
    }

    public function GetMatchFromSet($user1, $user2)
    {
        $sql = $GLOBALS['db'];
        $get_match = $sql->prepare('SELECT * FROM matches WHERE user1=:user1 AND user2=:user2');
        $get_match->bindValue(':user1', $user1);
        $get_match->bindValue(':user2', $user2);
        $get_match->execute();
        return $get_match->fetch();
    }

    public function DoesMatchExist($user1, $user2)
    {
        // check if one combinations of the matches exist
        if ($this->GetMatchFromSet($user1, $user2)) {
            return true;
        }

        if ($this->GetMatchFromSet($user2, $user1)) {
            return true;
        }

        return false;
    }
    
}
