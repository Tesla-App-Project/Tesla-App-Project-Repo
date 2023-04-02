<?php

class ControllerSimone
{
    public function defautAction()
    {

//        if(!isset($_SESSION['isLogged'])) {
//            header("Location: /");
//            exit;
//        }
//
//        if(!$_SESSION['token']){
//            View::show('popup', array());
//            return;
//        }

        //http://localhost:8080/index.php?url=helloworld/smthg
        $O_helloWorld =  new Simone();

        View::show('connexion', array('helloworld' =>  $O_helloWorld->giveMessage()));
    }

    public function loginAction()
    {

        if(!isset($_SESSION['isLogged'])) {
            header("Location: /");
            exit;
        }

        if(!$_SESSION['token']){
            View::show('popup', array());
            return;
        }

        //http://localhost:8080/index.php?url=helloworld/smthg
        $O_helloWorld =  new Simone();

        View::show('default/login', array('helloworld' =>  $O_helloWorld->giveMessage()));
    }

    //Example of url with my own domain name : http://tesloggy/simone/example
    public function exampleUserAction()
    {

        if(!isset($_SESSION['isLogged'])) {
            header("Location: /");
            exit;
        }

        if(!$_SESSION['token']){
            View::show('popup', array());
            return;
        }

        $O_helloWorld =  new ExampleUser();
        var_dump('exempleUserAction');

        View::show('default/see', array('helloworld' =>  $O_helloWorld->giveMessage()));
    }

    public function exampledbAction()
    {

        if(!isset($_SESSION['isLogged'])) {
            header("Location: /");
            exit;
        }

        if(!$_SESSION['token']){
            View::show('popup', array());
            return;
        }

        $O_helloWorld =  new ExampleDB();
        var_dump('exempleDbAction');

        View::show('default/see', array('helloworld' =>  $O_helloWorld->giveMessage()));
    }


    public function frogAction()
    {

        if(!isset($_SESSION['isLogged'])) {
            header("Location: /");
            exit;
        }

        if(!$_SESSION['token']){
            View::show('popup', array());
            return;
        }

        View::show('default/frog');
    }

    //Example of url with my own domain name : http://tesloggy/simone/validForm
    public function validFormSignupAction()
    {

        if(!isset($_SESSION['isLogged'])) {
            header("Location: /");
            exit;
        }

        if(!$_SESSION['token']){
            View::show('popup', array());
            return;
        }

        $O_helloWorld =  new validForm();
        var_dump('validFormSignupAction');

        View::show('default/see', array('helloworld' =>  $O_helloWorld->signup()));
    }

    public function validFormLoginAction()
    {

        if(!isset($_SESSION['isLogged'])) {
            header("Location: /");
            exit;
        }

        if(!$_SESSION['token']){
            View::show('popup', array());
            return;
        }

        $O_helloWorld =  new validForm();
        var_dump('validFormAction');

        View::show('default/login', array('helloworld' =>  $O_helloWorld->login()));
    }
}
