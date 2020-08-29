<?php

/**
 * users.php
 * 
 * contains all the util functions to interact with the users database
 * 
 * @author Jacky Wu
 * @author Shaan Khan
 */

require_once('../include/database.php');

class Swipes
{
    public function GetAllSwipes()
    {
        $sql = $GLOBALS['db'];
        $get_users = $sql->prepare('SELECT * FROM swipes');
        $get_users->execute();
        return $get_users->fetchAll();
    }

    public function AddSwipe($userID, $targetID, $swiped)
    {
        $sql = $GLOBALS['db'];
        $add_swipe = $sql->prepare('INSERT INTO swipes (userid, targetid, swiped) VALUES (:userid, :targetid, :swiped)');
        $add_swipe->bindValue(':userid', $userID);
        $add_swipe->bindValue(':targetid', $targetID);
        $add_swipe->bindValue(':swiped', $swiped ? 1 : 0);
        $add_swipe->execute();
    }

    public function ToggleSwipe($id, $state)
    {
        $sql = $GLOBALS['db'];
        $update_swipestate = $sql->prepare('UPDATE swipes SET swiped=:swiped WHERE id=:id');
        $update_swipestate->bindValue(':swiped', $state ? 1 : 0);
        $update_swipestate->bindValue(':id', $id);
        $update_swipestate->execute();
    }

    public function GetSwipeFromId($id)
    {
        $sql = $GLOBALS['db'];
        $get_swipe = $sql->prepare('SELECT * FROM swipes WHERE id=:id');
        $get_swipe->bindValue(':id', $id);
        $get_swipe->execute();
        return $get_swipe->fetch();
    }

    public function GetSwipeFromUseridAndTarget($userid, $targetid)
    {
        $sql = $GLOBALS['db'];
        $get_swipe = $sql->prepare('SELECT * FROM swipes WHERE userid=:userid AND targetid=:targetid');
        $get_swipe->bindValue(':userid', $userid);
        $get_swipe->bindValue(':targetid', $targetid);
        $get_swipe->execute();
        return $get_swipe->fetch();
    }
}
