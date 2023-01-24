<?php

class ControllerHome
{
    public function defautAction()
    {
        //http://localhost:8080/index.php?url=home
        $A_content = ['header' => 'test', 'content' => 'HomeView', 'footer' => 'test'];
        View::show('HomeView', $A_content);
        //View::show('HomeView', array());
    }
}