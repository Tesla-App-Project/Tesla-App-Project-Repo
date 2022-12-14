<?php

final class Example
{
    public function giveMessage()
    {
        //EXAMPLE

        $db = new Database();
        //if that's not working read the README, you have to apply the migrations


        /**
         * CREATE (['column'=>'value', 'second column'=>'value'], table name)
         * **/
        // $users = $db->queryCreateAction(
        //     [
        //         //colum name / DATA
        //         'email' => 'lucky@luke.com',
        //         'username' => 'jollyjumper',
        //         'firstname' => 'Mary',
        //         'lastname' => 'Jane',
        //         'token' => 'peanut',
        //         'password' => 'forget',
        //     ],
        //     'users'
        // );

        /**
         * UPDATE (id, ['column'=>'value', 'second column'=>'value'], table name)
         * **/
        // $users = $db->queryUpdateAction(1, ['username' => 'Dracula', 'email' => 'archibald@haddock.com'], 'users');

        /**
         *  GET  (id, ['column'=>'value', 'second column'=>'value'], table name)
         * // not working if you don't have the correspond data in you table
         * **/
<<<<<<< HEAD
        // return $db->queryGetAction(4, ['username' => 'jollyjumper', 'email' => 'lucky@luke.com'], 'users');
=======
        // $users = $db->queryUpdateAction(1, [['email' => 'Toto'], ['token' => 'Mimi']], 'users');
        // print_r($users);


        /**
         * CREATE ([['column'=>'value'], ['second column'=>'value']], table name)
         * **/
        $users = $db->queryCreateAction(
            [
                //colum name / DATA
                'email' => 'Toto@aaa.com',
                'username' => 'revolvers',
                'firstname' => 'Sandra',
                'lastname' => 'Gomassaille',
                'token' => 'pdm!c+1dç=UHFn',
                'password' => 'jalopalo', 
            ],
            'users'
        );

>>>>>>> cb7d484e5a611ef87b09886080ade0d7111c070c

        /**
         * DELETE (id, table name) //not working if you don't have the correspond data in you table
         * **/
        // $users = $db->queryDeleteAction(5, 'users');
    }
}
