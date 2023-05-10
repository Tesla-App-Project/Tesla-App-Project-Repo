<?php

class ControllerConnection
{
    public function defautAction()
    {
        if(isset($_SESSION['isLogged']) && $_SESSION['isLogged'] === true){
            header("Location: /home");
            exit;
        } else {
            //http://localhost:8080/index.php
            $A_View =
                [
                    'title' => 'Accueil',
                    'header' => 'HomeHeaderView',
                    'content' => 'ConnectionView',
                    'footer' => 'HomeFooterView',
                ];

            View::show('connexion', $A_View);
        }

    }
}