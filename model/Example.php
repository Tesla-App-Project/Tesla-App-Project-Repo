<?php

$filepath = realpath(dirname(__FILE__));
require_once($filepath."/../kernel/Database.php");

final class Example
{
    public function giveMessage()
    {
        //EXAMPLE

        $db = new Database();

        //UPDATE
        // //param = (field + value) soit [['pseudo' => 'Toto'],['other' => 'Mimi']]
        // return $db->queryUpdateAction(1, [['email' => 'Toto'], ['lastname' => 'Mimi']], 'user');

        //GET if it's not working read the README, you have to apply the migrations
        $users = $db->queryUpdateAction(1, [['email' => 'Toto'], ['token' => 'Mimi']], 'users');
        print_r($users);
    }
}
