<?php

final class ControleurHelloworld
{
    public function defautAction()
    {
        //http://localhost:8080/index.php?url=helloworld
        $O_helloworld =  new Helloworld();

        Vue::montrer('helloworld/voir', array('helloworld' =>  $O_helloworld->donneMessage()));
    }

    //http://localhost:8080/index.php?url=helloworld/boat
    public function boatAction()
    {
        $O_helloworld =  new Helloworld();
        var_dump('zzzz');
        Vue::montrer('helloworld/voir', array('helloworld' =>  $O_helloworld->donneMessage()));
    }
}
