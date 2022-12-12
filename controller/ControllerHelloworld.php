<?php

final class ControllerHelloworld
{
    public function defautAction()
    {
        //http://localhost:8080/index.php?url=helloworld
        $O_helloWorld =  new Helloworld();

        View::show('helloworld/see', array('helloworld' =>  $O_helloWorld->giveMessage()));
    }

    //http://localhost:8080/index.php?url=helloworld/boat
    public function boatAction()
    {
        $O_helloWorld =  new Helloworld();
        var_dump('boatAction');

        View::show('helloworld/see', array('helloworld' =>  $O_helloWorld->giveMessage()));
    }
}
