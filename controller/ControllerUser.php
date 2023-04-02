<?php

class ControllerUser
{
    /**
     * Envoie vers la page de connection
     * @return void
     */
    public function newLoginAction()
    {

        //http://localhost:8080/index.php?url=newlogin
        View::show('newlogin', array());
    }

    /**
     * Récupère les données du formulaire de connection et stocke l'utilisateur en base de données
     * @return void
     */
    public function newUserAction()
    {
       if (isset($_POST['user_first_name'])and ($_POST['user_last_name']) and ($_POST['user_username'])and($_POST['user_password'])and
           ($_POST['user_mail'])and($_POST['user_token'])){
           $user = new UserModel();
           $user->newUser($_POST['user_first_name'],$_POST['user_last_name'],
               $_POST['user_username'],password_hash($_POST['user_password'], CRYPT_SHA256),$_POST['user_mail'],$_POST['user_token']);
           header("Location: ?url=user/login");
     }else{
           header("Location: ?url=user/newlogin");
       }
    }

    public function loginAction()
    {
        //http://localhost:8080/index.php?url=login
        View::show('login', array());
    }

    public function loginUserAction()
    {
        if (($_POST['user_email']) and ($_POST['user_password'])){
            $user = new UserModel();
            $attempt = $user->connectUser($_POST['user_email'],password_hash($_POST['user_password'],CRYPT_SHA256));
            if ($attempt['status'] == 'success') header("Location: ?url=home");
            else header("Location: ?url=user/login");
        }else{
            header("Location: ?url=user/login");

        }
    }

}