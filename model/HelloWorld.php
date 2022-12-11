<?php


$filepath = realpath(dirname(__FILE__));
require_once($filepath."/../kernel/Database.php");

final class Helloworld
{
    private $S_message = "Hello World";

    public function donneMessage()
    {
        // return $this->S_message ;
        $db = new Database();


        //UPDATE
        // //param = (field + value) soit [['pseudo' => 'Toto'],['autre' => 'Mimi']]
        // return $db->queryUpdateAction(1, [['pseudo' => 'Toto'], ['autre' => 'Mimi']], 'utilisateur');

        //GET
        $users = $db->queryGetAction(1, ['pseudo', 'autre'], 'utilisateur');
        print_r($users);
    }
}
