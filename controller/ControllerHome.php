<?php

class ControllerHome
{
    public function defautAction()
    {
        //http://localhost:8080/index.php?url=home

        $A_content =
            ['title' => 'Accueil',
            'header' => 'HomeHeaderView',
            'content' => 'HomeView',
            'footer' => 'HomeFooterView'];
        View::show('HomeView', $A_content);

        //View::show('template', $A_content);
        //View::show('HomeView', array());
    }


}