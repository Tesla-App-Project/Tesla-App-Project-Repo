<?php

use JetBrains\PhpStorm\Pure;

class ControllerService extends ControllerAPI
{


    public function defautAction() : void {
        View::show("position", []);
    }

    /**
     * @API_route /api/1/vehicles/id_vehicle/service_data
     * @return void
     */
    public function getServiceDataAction() : void {
        echo $this->_httpRequestHandler->callAPI('getServiceData', true);
    }
}