<?php

$filepath = realpath(dirname(__FILE__));
require_once ($filepath."/../kernel/Database.php");

final class UserModel
{
    public function update()
    {

        $db = new Database();

        //UPDATE
        // //param = (field + value) soit [['pseudo' => 'Toto'],['other' => 'Mimi']]
        // return $db->queryUpdateAction(1, [['email' => 'Toto'], ['lastname' => 'Mimi']], 'user');

    }
    public function getuser()
    {

        $db = new Database();

        $users = $db->queryUpdateAction(1, [['email' => 'Toto'], ['token' => 'Mimi']], 'users');
        // print_r($users);
    }
    public function newuser($user_first_name,$user_last_name,$user_username,$user_password,$user_mail,$user_token)
    {
        $db = new Database();

        //CREATE user for example

        $users = $db->queryCreateAction(
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

