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

        $db->queryUpdateUserAction(['email' => $user_mail, 'firstname' => $user_first_name,'username'=>$user_username,'lastname' => $lastname]);
    }

    /**
     * Récupère un utilisateur en base de données
     * @param $user_mail
     * @param $user_password
     * @return void
     */
    public function getUser($user_mail,$user_password)
    {
        $db = new DatabaseUser();
        //login user
        $users = $db->queryGetUserAction(['email' => $user_mail, 'password' => $user_password]);
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
        //CREATE user
        $users = $db->queryCreateUserAction(
            [
                //colum name / DATA
                'email' => $user_mail,
                'firstname' => $user_first_name,
                'username' => $user_username,
                'lastname' => $user_last_name,
                'password' => $user_password,
                'token' => $user_token,
            ],
            'users'
        );

    }

}