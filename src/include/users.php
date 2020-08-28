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

    /**
     * Adds a new user to the database
     * 
     * @param password automatically handles bcrypt hashing at 10 rounds
     */
    public function AddUser($name, $username, $password, $roles, $instrument, $gender, $bio, $pfp, $genre, $songs, $level)
    {
        $sql = $GLOBALS['db'];
        $add_user = $sql->prepare('INSERT INTO users (name, username, password, roles, instrument, gender, bio, pfp, genre, songs, level, active) VALUES (:name, :username, :password, :roles, :instrument, :gender, :bio, :pfp, :genre, :songs, :level, :active)');
        $add_user->bindValue(':name', $name);
        $add_user->bindValue(':username', $username);
        $add_user->bindValue(':password', password_hash($password, PASSWORD_DEFAULT));
        $add_user->bindValue(':roles', $roles);
        $add_user->bindValue(':instrument', $instrument);
        $add_user->bindValue(':gender', $gender);
        $add_user->bindValue(':bio', $bio);
        $add_user->bindValue(':pfp', $pfp);
        $add_user->bindValue(':genre', $genre);
        $add_user->bindValue(':songs', $songs);
        $add_user->bindValue(':level', $level);
        $add_user->bindValue(':active', 1); // default active
        $add_user->execute();
    }

    /**
     * Toggles a user state given an ID
     */
    public function ToggleUser($id, $state)
    {
        $sql = $GLOBALS['db'];
        $toggle_user = $sql->prepare('UPDATE users SET active=:active WHERE id=:id');
        $toggle_user->bindValue(':active', $state ? 1 : 0);
        $toggle_user->bindValue(':id', $id);
        $toggle_user->execute();
    }

    /**
     * Update the user's bio
     */
    public function EditBio($id, $bio)
    {
        $sql = $GLOBALS['db'];
        $update_bio = $sql->prepare('UPDATE users SET bio=:bio WHERE id=:id');
        $update_bio->bindValue(':bio', $bio);
        $update_bio->bindValue(':id', $id);
        $update_bio->execute();
    }

    /**
     * Edits the user profile link in database
     */
    public function EditPfp($id, $pfp)
    {
        $sql = $GLOBALS['db'];
        $update_pfp = $sql->prepare('UPDATE user SET pfp=:pfp WHERE id=:id');
        $update_pfp->bindValue(':pfp', $pfp);
        $update_pfp->bindValue(':id', $id);
        $update_pfp->execute();
    }

    /**
     * Gets a user from a specifc id
     * 
     * @return Array User information from given ID
     */
    public function GetUserFromId($id)
    {
        $sql = $GLOBALS['db'];
        $get_user = $sql->prepare('SELECT * FROM users WHERE id=:id');
        $get_user->bindValue(':id',$id);
        $get_user->execute();
        return $get_user->fetch();
    }

    /**
     * Gets a user with a username
     * 
     * @return Array user information from given username
     */
    public function GetUserFromUsername($username)
    {
        $sql = $GLOBALS['db'];
        $get_user = $sql->prepare('SELECT * FROM users WHERE username=:username');
        $get_user->bindValue(':username',$username);
        $get_user->execute();
        return $get_user->fetch();
    }
}
