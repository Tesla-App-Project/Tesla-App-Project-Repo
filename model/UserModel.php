<?php

$filepath = realpath(dirname(__FILE__));
require_once ($filepath."/../kernel/DatabaseUser.php");

final class UserModel
{
    public function updateUser($user_mail,$user_first_name,$user_username,$lastname)
    {
        $db = new DatabaseUser();
        //UPDATE user

        $db = new DatabaseUser();

        //UPDATE
        // //param = (field + value) soit [['pseudo' => 'Toto'],['other' => 'Mimi']]
        // return $db->queryUpdateAction(1, [['email' => 'Toto'], ['lastname' => 'Mimi']], 'user');

        $db->queryUpdateUserAction(['email' => $user_mail, 'firstname' => $user_first_name,'username'=>$user_username,'lastname' => $lastname]);
    }

    public function getUser($user_mail,$user_password)
    {

        $db = new DatabaseUser();

        $users = $db->queryUpdateAction(1, [['email' => 'Toto'], ['token' => 'Mimi']], 'users');
        // print_r($users);

    }

    public function newUser($user_first_name,$user_last_name,$user_username,$user_password,$user_mail,$user_token)
    {
        $db = new DatabaseUser();

        //CREATE user for example

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

