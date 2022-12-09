<?php

class SpeedLimitController
{
    private HttpRequestHandlerModel $_httpRequestHandler;

    public function __construct()
    {
        $this->_httpRequestHandler = new HttpRequestHandlerModel();
    }

    //TODO : Rename this function when activating and deactivating routes are used together

    /**
     * @API_route /api/1/vehicles/id_vehicle/command/speed_limit_activate | /api/1/vehicles/id_vehicle/command/speed_limit_deactivate
     * @return void
     * @throws Exception
     */
    public function postSpeedLimitToggleStateAction() : void {
        echo $this->_httpRequestHandler->callAPI('postSpeedLimitToggleState', false);
    }

    /**
     * @API_route /api/1/vehicles/id_vehicle/command/speed_limit_clear_pin
     * @return void
     * @throws Exception
     */
    public function postSpeedLimitClearPinAction() : void {
        echo $this->_httpRequestHandler->callAPI('postSpeedLimitClearPin', false);
    }

    /**
     * @API_route /api/1/vehicles/id_vehicle/command/speed_limit_set_limit
     * @return void
     * @throws Exception
     */
    public function postSpeedLimitSetLimitAction() : void {
        echo $this->_httpRequestHandler->callAPI('postSpeedLimitSetLimit', false);
    }
}