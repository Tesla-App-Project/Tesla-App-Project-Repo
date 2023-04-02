<?php

$filepath = realpath(dirname(__FILE__));
require_once ($filepath."/../kernel/DatabaseUser.php");

final class UserModel
{
    /**
     * Met à jour un utilisateur en base de données
     * @param $user_mail
     * @param $user_first_name
     * @param $user_username
     * @param $lastname
     * @return void
     */
    public function updateUser($user_mail,$user_first_name,$user_username,$lastname)
    {
        $db = new DatabaseUser();
        //UPDATE user

        $db->queryUpdateUserAction($user_mail, $user_first_name,$user_username,$lastname, $_SESSION["id"]);
    }

    /**
     * Met à jour un token utilisateur en base de données
     * @param $token
     * @return void
     */
    public function updateToken($token): void
    {
        $db = new DatabaseUser();
        $db->queryUpdateTokenUserAction($token, $_SESSION["id"]);


    }

    /**
     * Récupère un utilisateur en base de données
     * @param string $user_mail
     * @param string $user_password
     * @return array
     */
    public function getUser(string $user_mail,string $user_password): array
    {
        $db = new DatabaseUser();
        //login user
        return $db->queryGetUserAction(
            $user_mail,
            $user_password
        );

    }

    /**
     * Récupère un token utilisateur en base de données
     * @param string $user_mail
     * @param string $user_id
     * @return array
     */
    public function getUserToken(string $user_mail,string $user_id): array
    {
        $db = new DatabaseUser();
        //login user
        return $db->queryGetUserTokenAction(
            $user_mail,
            $user_id
        );

    }

    /**
     * Créée un nouvel utilisateur en base de données
     * @param $user_first_name
     * @param $user_last_name
     * @param $user_username
     * @param $user_password
     * @param $user_mail
     * @return void
     */
    public function newUser($user_first_name,$user_last_name,$user_username,$user_password,$user_mail)
    {
        $db = new DatabaseUser();
        //CREATE user
        $db->queryCreateUserAction(
            $user_mail,
            $user_first_name,
            $user_username,
            $user_last_name,
            $user_password
        );

    }

}