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
//        die(var_dump($_POST));
        if (
            isset($_POST['user_first_name']) and isset($_POST['user_last_name']) and isset($_POST['user_username']) and isset($_POST['user_password']) and isset($_POST['user_mail'])){
//            die(var_dump("test"));
            $user = new UserModel();
            $user->newUser(
                $_POST['user_first_name'],
                $_POST['user_last_name'],
                $_POST['user_username'],
                password_hash($_POST['user_password'], PASSWORD_DEFAULT),
                $_POST['user_mail']
            );
        }
        header("Location: /");
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

    public function logoutAction()
    {
        session_unset();
        session_destroy();
        header("Location: /");
    }

    public function verifyTokenAction() {

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $token = json_decode(file_get_contents('php://input'))->{'token'};

            $ch = curl_init();

            // Check if initialization had gone wrong*
            if ($ch === false) {
                throw new Exception('failed to initialize');
            }

            curl_setopt($ch, CURLOPT_URL, "https://owner-api.teslamotors.com/api/1/vehicles");

            $headers = [];
            $headers = [
                0 => 'Content-Type: application/json; charset=utf-8',
                1 => "Authorization: Bearer {$token}",
            ];

            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

            try {
                $result = curl_exec($ch);
            } catch (Exception $e) {
                var_dump($e->getCode() . " " . $e->getMessage());
            } finally {
                curl_close($ch);
                //die(var_dump(isset(json_decode($result)->{"error"})));
                if (isset(json_decode($result)->{"error"})) {
                    echo json_encode(["response" => "error"]);
                } else {
                    $user = new UserModel();
                    $user->updateToken($token);
                    echo json_encode(["response" => "validate"]);
                }

            }
        }

    }

    public function refreshTokenAction() {
        $_SESSION['token'] = true;
        header("Location: /home");
    }

}