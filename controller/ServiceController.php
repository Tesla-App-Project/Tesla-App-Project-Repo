<?php

use JetBrains\PhpStorm\Pure;

class ServiceController
{
    private HttpRequestHandlerModel $_httpRequestHandler;

    #[Pure] public function __construct()
    {
        $this->_httpRequestHandler = new HttpRequestHandlerModel();
    }

    /**
     * @API_route /api/1/vehicles/id_vehicle/service_data
     * @return void
     * @throws Exception
     */
    public function getServiceDataAction() : void {
        echo $this->_httpRequestHandler->callAPI('getServiceData', true);
    }
}