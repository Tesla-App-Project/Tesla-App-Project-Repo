<?php

$filepath = realpath(dirname(__FILE__));
require_once ($filepath."/../kernel/DatabaseUser.php");

final class UserModel
{

    public function updateUser($user_mail,$user_first_name,$user_username,$lastname,$id)
    {
        $db = new DatabaseUser();
        //UPDATE user

        $db->queryUpdateUserAction(['email' => $user_mail, 'firstname' => $user_first_name,'username'=>$user_username,'lastname' => $lastname,'id'=>$id]);
    }

    public function getUser($user_mail,$user_password)
    {
        $db = new DatabaseUser();
        //login user
        $users = $db->queryGetUserAction(['email' => $user_mail, 'password' => $user_password]);
    }

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
    public function deletUser($id)
    {
        $db = new DatabaseUser();
        //DELETE user
        $users = $db->queryDeleteUserAction(['id'=>$id]);
    }
}

