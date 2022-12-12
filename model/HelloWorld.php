<?php


$filepath = realpath(dirname(__FILE__));
require_once($filepath."/../kernel/Database.php");

final class Helloworld
{
    private $S_message = "Hello World";

    public function giveMessage()
    {
        // return $this->S_message ;
        $db = new Database();


        //UPDATE
        // //param = (field + value) soit [['pseudo' => 'Toto'],['other' => 'Mimi']]
        // return $db->queryUpdateAction(1, [['pseudo' => 'Toto'], ['other' => 'Mimi']], 'user');

        //GET
        $users = $db->queryGetAction(1, ['pseudo', 'other'], 'user');
        print_r($users);
    }
}
