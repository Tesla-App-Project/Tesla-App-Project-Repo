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
        $this->servAdresse = $_ENV["SERV_ADRESSE"];
        $this->_httpRequestHandler = new HttpRequestHandlerModel("letokendelatesla");
    }
}