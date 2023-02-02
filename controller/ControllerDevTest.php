<?php

final class ControllerDevTest
{
    public function defautAction()
    {
        //http://localhost:8080/index.php?url=helloworld
        $O_helloworld =  new HelloworldModel();
        View::show('helloworld/HelloworldView', array('helloworld' =>  $O_helloworld->donneMessage()));
    }

    //http://localhost:8080/index.php?url=helloworld&action=wake_up
    /**
     * @throws Exception
     */
    public function wake_upAction()
    {
        $O_apimodel =  new ApiModel();
        //$O_apimodel->setToken("letokendelatesla"); the token is stored in the .env for now, it will be stored in the database later
        $O_apimodel->setIdCar("1493131276665295");
        View::show('helloworld/HelloworldView', array('helloworld' => var_dump($O_apimodel->HVACState())));
        View::show('helloworld/HelloworldView', array('helloworld' => var_dump($O_apimodel->isHVACOn())));
        //View::show('helloworld/HelloworldView', array('helloworld' => var_dump($O_apimodel->postChargePortClose())));
    }
}
