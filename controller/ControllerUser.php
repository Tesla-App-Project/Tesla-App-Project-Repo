<?php

class ControllerUser
{
    public function loginAction()
    {
        //http://localhost:8080/index.php?url=login
        View::show('login', array());
    }

    public function connectUserAction()
    {
       if (isset($_POST['user_first_name'])and ($_POST['user_last_name']) and ($_POST['user_username'])and($_POST['user_password'])and
           ($_POST['user_mail'])and($_POST['user_token'])){
           $user = new UserModel();
           $user->newuser($_POST['user_first_name'],$_POST['user_last_name'],
               $_POST['user_username'],password_hash($_POST['user_password'], PASSWORD_DEFAULT),$_POST['user_mail'],$_POST['user_token']);
     }/*else{
          header('Location : http://localhost/projet/tesla-app-project-repo/index.php?url=user/login');
       }*/
    }
}