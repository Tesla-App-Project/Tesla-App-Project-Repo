<?php

$filepath = realpath(dirname(__FILE__));
require_once ($filepath."/../kernel/DatabaseUser.php");

final class UserModel
{
    private string $first_name;
    private string $last_name;
    private string $username;
    private string $email;
    private string $password;
    private string $bearer_token;
    private string $refresh_token;

    /**
     * Met à jour un utilisateur en base de données
     * @param $user_mail
     * @param $user_first_name
     * @param $user_username
     * @param $lastname
     * @return void
     */
    public function updateUser($user_mail,$user_first_name,$user_username,$lastname, $id)
    {
        $db = new DatabaseUser();
        //UPDATE user

        $db->queryUpdateUserAction($user_mail, $user_first_name, $user_username, $lastname, $id);
    }

    /**
     * Récupère un utilisateur en base de données
     * @param $user_mail
     * @param $user_password
     * @return array|string[]
     */
    public function connectUser($user_mail, $user_password)
    {
        $db = new DatabaseUser();
        //login user
        return $db->queryConnectUserAction($user_mail, $user_password);
    }

    public function getUser($id)
    {
        $db = new DatabaseUser();
        $user = $db->queryGetUserAction($id);
        $this->first_name = $user['firstname'];
        $this->last_name = $user['lastname'];
        $this->username = $user['username'];
        $this->email = $user['email'];
        $this->password = $user['password'];
        $this->bearer_token = $user['bearer_token'];
        $this->refresh_token = $user['refresh_token'];
    }

    /**
     * Créée un nouvel utilisateur en base de données
     * @param $user_first_name
     * @param $user_last_name
     * @param $user_username
     * @param $user_password
     * @param $user_mail
     * @param $user_token
     * @return void
     */
    public function newUser($user_first_name,$user_last_name,$user_username,$user_password,$user_mail,$user_token)
    {
        $db = new DatabaseUser();

        //CREATE user for example

        //CREATE user
        $db->queryCreateUserAction($user_mail, $user_first_name, $user_username, $user_last_name, $user_password, $user_token);
    }

    public function refreshToken($bearerTk, $refreshTk)
    {
        $db = new DatabaseUser();
        $db->queryUpdateTokenAction($bearerTk, $refreshTk);
    }

    public function getFirstName(): string
    {
        return $this->first_name;
    }

    public function getLastName(): string
    {
        return $this->last_name;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getBearerToken(): string
    {
        return $this->bearer_token;
    }

    public function getRefreshToken(): string
    {
        return $this->refresh_token;
    }


}

