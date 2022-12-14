<?php

final class ControllerSimone
{
    public function defautAction()
    {
        //http://localhost:8080/index.php?url=helloworld/smthg
        $O_helloWorld =  new Simone();

        View::show('default/see', array('helloworld' =>  $O_helloWorld->giveMessage()));
    }

    //http://localhost:8080/index.php?url=helloworld/boat
    //new way
    //http://tesloggy/simone/boat
    public function boatAction()
    {
        $O_helloWorld =  new Example();
        var_dump('boatAction');

        View::show('default/see', array('helloworld' =>  $O_helloWorld->giveMessage()));
    }

    //Example of url with my own domain name : http://tesloggy/simone/example
    public function exampleAction()
    {
        $O_helloWorld =  new Example();
        var_dump('exempleAction');

        View::show('default/see', array('helloworld' =>  $O_helloWorld->giveMessage()));
    }

    //http://localhost:8080/index.php?url=helloworld/peanut
    public function frogAction()
    {
        View::show('default/frog');
    }
}
