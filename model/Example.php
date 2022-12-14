<?php

final class Example
{
    public function giveMessage()
    {
        //EXAMPLE

        $db = new Database();
        //if that's not working read the README, you have to apply the migrations


        /**
         * UPDATE (id, [['column'=>'value'], ['second column'=>'value']], table name)
         * **/
        // return $db->queryUpdateAction(4, [['email' => 'Totzzzzzzzzzzzzzo@fazfa.com'], ['lastname' => 'Mimi']], 'users');


        /**
         *  GET  (id, [['column'=>'value'], ['second column'=>'value']], table name)
         * // not working if you don't have the correspond data in you table
         * **/
        // $users = $db->queryUpdateAction(1, [['email' => 'Toto'], ['token' => 'Mimi']], 'users');
        // print_r($users);


        /**
         * CREATE ([['column'=>'value'], ['second column'=>'value']], table name)
         * **/
        $users = $db->queryCreateAction(
            [
                //colum name / DATA
                'email' => 'Toto@aaa.com',
                'username' => 'loa',
                'firstname' => 'Sandra',
                'lastname' => 'Gomassaille',
                'token' => 'peanut',
                'password' => 'forget',
            ],
            'users'
        );


        /**
         * DELETE (id, table name) //not working if you don't have the correspond data in you table
         * **/
        // $users = $db->queryDeleteAction(2, 'users');
    }
}
