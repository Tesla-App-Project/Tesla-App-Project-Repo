<?php

final class ControleurHelloworld
{
    public function defautAction()
    {
        //http://localhost:8080/index.php?url=helloworld
        $O_helloWorld =  new Helloworld();

        Vue::montrer('helloworld/voir', array('helloworld' =>  $O_helloWorld->donneMessage()));
    }

    //http://localhost:8080/index.php?url=helloworld/boat
    public function boatAction()
    {
        $O_helloWorld =  new Helloworld();
        var_dump('zzazdzdzz');

        Vue::montrer('helloworld/voir', array('helloworld' =>  $O_helloWorld->donneMessage()));
    }
}
