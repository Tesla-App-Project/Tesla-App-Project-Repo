<?php

final class ExampleUser
{
    public function giveMessage()
    {
        //EXAMPLE

        $db = new DatabaseUser();
        //if that's not working read the README (you have to apply the migrations)

        /**
         * CREATE (['column'=>'value', 'second column'=>'value'], table name)
         * **/

        // $message = $db->queryCreateUserAction(
        //     'lucky@luke.com',
        //     'Dracula',
        //     'Mary',
        //     'Jane',
        //     'PASSWD',
        // );


        /**
         * UPDATE (id, ['column'=>'value', 'second column'=>'value'], table name)
         * **/

        // $message = $db->queryUpdateUserAction(
        //     'lucky@luke.com',
        //     'Dracula',
        //     'peanut',
        //     'forget_@hey',
        //     6
        // );

        /**
         *  READ  (id, ['column'=>'value', 'second column'=>'value'], table name)
         * // not working if you don't have the correspond data in you table
         * RETURN :
         * queryGetAction give you back an array like that : [username = 'Dracula'] => 1 [email = 'archibald@haddock.com'] => 1
         * if the value => 1, this means that the value exists in the DB otherwise, it does not exist in the database
         * **/

        $value = $db->queryGetUserAction('alucky@luke.com', 'PASSWD'); //mdp bcrypte
        var_dump($value);

        /**
         * DELETE (id)
         * **/
        // $message = $db->queryDeleteUserAction(7);
    }
}
