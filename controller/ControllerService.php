<?php

use JetBrains\PhpStorm\Pure;

class ControllerService
{
    private HttpRequestHandlerModel $_httpRequestHandler;

    #[Pure] public function __construct()
    {
        $this->_httpRequestHandler = new HttpRequestHandlerModel();
    }

    /**
     * @API_route /api/1/vehicles/id_vehicle/service_data
     * @return void
     */
    public function getServiceDataAction() : void {
        echo $this->_httpRequestHandler->callAPI('getServiceData', true);
    }
}