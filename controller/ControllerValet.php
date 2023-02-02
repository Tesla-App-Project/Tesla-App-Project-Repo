<?php

class ControllerValet
{
    private HttpRequestHandlerModel $_httpRequestHandler;

    public function __construct()
    {
        $this->_httpRequestHandler = new HttpRequestHandlerModel();
    }

    /**
     * @API_route /api/1/vehicles/id_vehicle/command/reset_valet_pin
     * @return void
     * @throws Exception
     */
    public function postResetValetPinAction() : void {
        echo $this->_httpRequestHandler->callAPI('postResetValetPin', false);
    }

    /**
     * @API_route /api/1/vehicles/id_vehicle/command/set_valet_mode
     * @return void
     * @throws Exception
     */
    public function postSetValetModeAction() : void {
        echo $this->_httpRequestHandler->callAPI('postSetValetMode', false);
    }
}