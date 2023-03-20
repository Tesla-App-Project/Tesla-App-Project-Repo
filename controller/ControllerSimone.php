<?php

final class ControllerSimone
{
    public function defautAction()
    {
        //http://localhost:8080/index.php?url=helloworld/smthg
        $O_helloWorld =  new Simone();

        View::show('connexion', array('helloworld' =>  $O_helloWorld->giveMessage()));
    }

    public function loginAction()
    {
        //http://localhost:8080/index.php?url=helloworld/smthg
        $O_helloWorld =  new Simone();

        View::show('default/login', array('helloworld' =>  $O_helloWorld->giveMessage()));
    }

    //http://localhost:8080/index.php?url=helloworld/boat
    //new way
    //http://teslapp/simone/boat

    //Example of url with my own domain name : http://tesloggy/simone/example
    public function exampleUserAction()
    {
        $O_helloWorld =  new ExampleUser();
        var_dump('exempleAction');

        View::show('default/see', array('helloworld' =>  $O_helloWorld->giveMessage()));
    }

    //http://localhost:8080/index.php?url=helloworld/peanut
    public function frogAction()
    {
        View::show('default/frog');
    }

    //Example of url with my own domain name : http://tesloggy/simone/validForm
    public function validFormSignupAction()
    {
        $O_helloWorld =  new validForm();
        var_dump('validFormSignupAction');

        View::show('default/see', array('helloworld' =>  $O_helloWorld->signup()));
    }

    public function validFormLoginAction()
    {
        $O_helloWorld =  new validForm();
        var_dump('validFormAction');

        View::show('default/login', array('helloworld' =>  $O_helloWorld->login()));
    }
}
