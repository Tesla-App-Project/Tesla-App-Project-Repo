<?php

final class Example
{
    public function giveMessage()
    {
        //EXAMPLE

        $db = new Database();
        //if that's not working read the README (you have to apply the migrations)

        /**
         * CREATE (['column'=>'value', 'second column'=>'value'], table name)
         * **/

        // $message = $db->queryCreateAction(
        //     [
        //         //colum name / DATA
        //         'email' => 'lucky@luke.com',
        //         'username' => 'Dracula',
        //         'firstname' => 'Mary',
        //         'lastname' => 'Jane',
        //         'token' => 'peanut',
        //         'password' => 'forget_@hey',
        //     ],
        //     'users'
        // );


        /**
         * UPDATE (id, ['column'=>'value', 'second column'=>'value'], table name)
         * **/

        // $message = $db->queryUpdateAction(1, ['username' => 'Dracula', 'email' => 'archibald@haddock.com'], 'users');


        /**
         *  READ  (id, ['column'=>'value', 'second column'=>'value'], table name)
         * // not working if you don't have the correspond data in you table
         * RETURN :
         * queryGetAction give you back an array like that : [username = 'Dracula'] => 1 [email = 'archibald@haddock.com'] => 1
         * if the value => 1, this means that the value exists in the DB otherwise, it does not exist in the database
         * **/

        // $value = $db->queryGetAction(['username' => 'Dracula', 'password' => 'forget_@hey'], 'users'); //mdp bcrypte
        // print_r($value);


        /**
         * DELETE (id, table name) //not working if you don't have the correspond data in you table
         * **/

        // $message = $db->queryDeleteAction(5, 'users');
    }
}
