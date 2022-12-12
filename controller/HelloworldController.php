<?php

final class HelloworldController
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
        $O_apimodel->setToken("letokendelatesla");
        View::show('helloworld/HelloworldView', array('helloworld' => var_dump($O_apimodel->postWakeUp())));
        View::show('helloworld/HelloworldView', array('helloworld' => var_dump($O_apimodel->postActuateTrunk())));
        $O_apimodel->revokeToken();
        View::show('helloworld/HelloworldView', array('helloworld' => var_dump($O_apimodel->postWakeUp())));
        View::show('helloworld/HelloworldView', array('helloworld' => var_dump($O_apimodel->postActuateTrunk())));
    }
}
