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
               $_POST['user_username'],password_hash($_POST['user_password'], PASSWORD_DEFAULT),$_POST['user_mail'],$_POST['user_token']);
     }else{
           header("Location: http://localhost/projet/tesla-app-project-repo/index.php?url=user/newlogin/");
       }
    }

    public function loginAction()
    {
        //http://localhost:8080/index.php?url=login
        View::show('login', array());
    }

    public function loginUserAction()
    {
        if (($_POST['user_username']) and ($_POST['user_password'])){
            $user = new UserModel();
            $user->getUser($_POST['user_username'],$_POST['user_password']);
        }else{
            header("Location: http://localhost/projet/tesla-app-project-repo/index.php?url=user/login/");
        }
    }

}