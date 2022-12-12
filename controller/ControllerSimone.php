<?php

final class ControllerSimone
{
    public function defautAction()
    {
        //http://localhost:8080/index.php?url=helloworld
        $O_helloWorld =  new Simone();

        View::show('default/see', array('helloworld' =>  $O_helloWorld->giveMessage()));
    }

    //http://localhost:8080/index.php?url=helloworld/boat
    public function boatAction()
    {
        $O_helloWorld =  new Simone();
        var_dump('boatAction');

        View::show('default/see', array('helloworld' =>  $O_helloWorld->giveMessage()));
    }

    //http://localhost:8080/index.php?url=helloworld/peanut
    public function frogAction()
    {
        $O_helloWorld =  new Simone();

        View::show('default/frog');
    }
}
