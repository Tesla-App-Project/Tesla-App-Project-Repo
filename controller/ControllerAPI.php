<?php

use JetBrains\PhpStorm\Pure;

abstract class ControllerAPI
{
    protected HttpRequestHandlerModel $_httpRequestHandler;

    #[Pure] public function __construct()
    {
        //$_SESSION['user_id']
        //$user = new User();
        //$token =
        $this->_httpRequestHandler = new HttpRequestHandlerModel("letokendelatesla");
    }
}