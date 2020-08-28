<?php

/**
 * Manages server sessions
 * 
 * @author Jacky Wu
 */

require_once("database.php");

/* begins the session */
session_start();




class Sessions
{
    /* session configuration */

    private $EXPIRE_TOKEN = 1800;
    private $TOKEN_VALUE = "token";

    public static function GenerateToken()
    {
        $cur_time_str = time() + mt_rand(1, 9999999999);
        $token = hash('sha256', $cur_time_str);
        return $token;
    }

    /**
     * Creates a new session given a user id
     * 
     * take caution of calling this function without verification since we do not account for it here
     */
    public function CreateSession($user_id, $ip)
    {
        $sql = $GLOBALS['db'];
        $create_session = $sql->prepare('INSERT INTO sessions (userid, ip, token, time, active) VALUES (:userid, :ip, :token, :time, :active)');
        $create_session->bindValue(':userid', $user_id);
        $create_session->bindValue(':ip', $ip);
        $create_session->bindValue(':token', $this->GenerateToken());
        $create_session->bindValue(':time', time());
        $create_session->bindValue(':active', 1);
        $create_session->execute();
    }

    /**
     * Sets a session state given an id
     */
    public function ToggleSession($id, $state)
    {
        $sql = $GLOBALS['db'];
        $set_session = $sql->prepare('UPDATE sessions SET active=:active WHERE id=:id');
        $set_session->bindValue(':active', $state ? 1 : 0);
        $set_session->bindValue(':id', $id);
        $set_session->execute();
    }


    public function GetSessionFromToken($token)
    {   
        $sql = $GLOBALS['db'];
        $get_sess = $sql->prepare('SELECT * FROM sessions WHERE token=:token');
        $get_sess->bindValue(':token', $token);
        $get_sess->execute();
        return $get_sess->fetch();
    }

}