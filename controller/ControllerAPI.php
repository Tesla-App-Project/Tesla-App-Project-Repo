<?php

use JetBrains\PhpStorm\Pure;

abstract class ControllerAPI
{
    protected HttpRequestHandlerModel $_httpRequestHandler;
    protected string $servAdresse;

    #[Pure] public function __construct()
    {
        $dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
        $dotenv->load();
        //$_SESSION['user_id']
        //$user = new User();
        //$token =
        //
        //recuperer le base url du serveur
        if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
            $url = "https";
        else
            $url = "http";

        // Ajoutez // à l'URL.
        $url .= "://";

        // Ajoutez l'hôte (nom de domaine, ip) à l'URL.
        $url .= $_SERVER['HTTP_HOST'];

        // Ajouter l'emplacement de la ressource demandée à l'URL
        $url .= $_SERVER['REQUEST_URI'];

        $this->servAdresse = $url;
        //$this->servAdresse = $_ENV["SERV_ADRESSE"];

        $user = new UserModel();
        if (isset($_SESSION['id'])) {
            $user->getUser($_SESSION['id']);
            //TODO fetch car id to SESSION on logging in
            $this->_httpRequestHandler = new HttpRequestHandlerModel($user->getBearerToken(), '1493131276665295', null);
        }
        else $this->_httpRequestHandler = new HttpRequestHandlerModel('', '', null);
    }
}