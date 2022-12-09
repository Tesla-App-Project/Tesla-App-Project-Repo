<?php

final class HelloworldController
{
    public function defautAction()
    {
        //http://localhost:8080/index.php?url=helloworld
        $O_helloworld =  new HelloworldModel();
        View::montrer('helloworld/HelloworldView', array('helloworld' =>  $O_helloworld->donneMessage()));
    }

    //http://localhost:8080/index.php?url=helloworld&action=wake_up
    /**
     * @throws Exception
     */
    public function wake_upAction()
    {
        $O_apimodel =  new ApiModel();
        View::montrer('helloworld/HelloworldView', array('helloworld' => var_dump($O_apimodel->postWakeUp())));
    }
}
