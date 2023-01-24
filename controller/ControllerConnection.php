<?php

class ControllerConnection
{
    public function defautAction()
    {
        //http://localhost:8080/index.php?url=home
        $A_content =
            ['title' => 'Accueil',
            'content' => 'ConnectionView',];

        View::show('template', $A_content);
        //View::show('HomeView', array());
    }
}