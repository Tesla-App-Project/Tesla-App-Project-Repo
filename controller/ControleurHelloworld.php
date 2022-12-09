<?php

final class ControleurHelloworld
{
    public function defautAction()
    {
        //http://localhost:8080/index.php?url=helloworld
        $O_helloworld =  new Helloworld();
        Vue::montrer('helloworld/voir', array('helloworld' =>  $O_helloworld->donneMessage()));
    }

    //http://localhost:8080/index.php?url=helloworld&action=wake_up
    public function wake_upAction()
    {
        $O_apimodel =  new APIModel();
        Vue::montrer('helloworld/voir', array('helloworld' => var_dump($O_apimodel->postActuateTrunk()["result"])));
    }
}
