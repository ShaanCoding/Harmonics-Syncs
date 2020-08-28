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

    public $EXPIRE_TIME = 1800;
    public $TOKEN_NAME = "token";

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
    public function CreateSession($user_id, $ip, $token)
    {
        $sql = $GLOBALS['db'];
        $create_session = $sql->prepare('INSERT INTO sessions (userid, ip, token, time, active) VALUES (:userid, :ip, :token, :time, :active)');
        $create_session->bindValue(':userid', $user_id);
        $create_session->bindValue(':ip', $ip);
        $create_session->bindValue(':token', $token);
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

    /**
     * Returns a list of all sessions given a user id
     */
    public function GetAllSessionsFromUser($userid)
    {
        $sql = $GLOBALS['db'];
        $get_sessions = $sql->prepare('SELECT * FROM sessions WHERE userid=:userid');
        $get_sessions->bindValue(':userid', $userid);
        $get_sessions->bindValue(':active', 1);
        $get_sessions->execute();
        return $get_sessions->fetchAll();
    }

    /**
     * Returns a list of all active sessions given a user id
     */
    public function GetAllActiveSessionsFromUser($userid)
    {
        $sql = $GLOBALS['db'];
        $get_sessions = $sql->prepare('SELECT * FROM sessions WHERE userid=:userid AND active=:active');
        $get_sessions->bindValue(':userid', $userid);
        $get_sessions->bindValue(':active', 1);
        $get_sessions->execute();
        return $get_sessions->fetchAll();
    }

    /**
     * Returns true if a session has expire
     */
    public function HasSessionExpired($session)
    {
        if (!$session['active']) {
            return true;
        }

        $expiry = $session['time'] + $this->EXPIRE_TIME;
        return (time() > $expiry);
    }

    /**
     * Checks all users sessions and validates them
     */
    public function ValidateSessions($userid)
    {
        $all_sessions = $this->GetAllActiveSessionsFromUser($userid);

        foreach ($all_sessions as $session) {

            if ($this->HasSessionExpired($session)) {
                $this->ToggleSession($session['id'], false);
            }
        }
    }

    /**
     * Automatically redirects to log-in page if session is bad
     */
    public function RequireSession($token, $url, $ip)
    {
        $current_session = $this->GetSessionFromToken($token);

        if ($current_session) {

            $this->ValidateSessions($current_session['userid']); // automatically verifies the tokens
            $current_session = $this->GetSessionFromToken($token); // update

            if (!$this->HasSessionExpired($current_session)) {

                if ($ip == $current_session['ip']) {
                    return; // continue as usual
                }
            }
        }

        // redirect 
        header('Location: ' . $url);
        die('');
    }
}
