<?php

class HomeController
{
    public function defautAction()
    {
        //http://localhost:8080/index.php?url=home
        View::montrer('HomeView', array());
    }
}