<?php

class ControllerHome
{
    public function defautAction()
    {
        //http://localhost:8080/index.php?url=home
        View::show('HomeView', array());
    }
}