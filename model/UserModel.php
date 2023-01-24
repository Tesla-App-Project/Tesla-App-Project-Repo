<?php

$filepath = realpath(dirname(__FILE__));
require_once ($filepath."/../kernel/Database.php");

final class UserModel
{
    public function updateUser($user_mail,$user_first_name,$user_username,$lastname)
    {
        $db = new Database();
        //UPDATE user

         return $db->queryUpdateUserAction(['email' => $user_mail, 'firstname' => $user_first_name,'username'=>$user_username,'lastname' => $lastname]);
    }

    public function getUser($user_mail,$user_password)
    {
        $db = new Database();
        //login user
        $users = $db->queryGetUserAction(['email' => $user_mail, 'password' => $user_password]);
    }

    public function newUser($user_first_name,$user_last_name,$user_username,$user_password,$user_mail,$user_token)
    {
        $db = new Database();
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

