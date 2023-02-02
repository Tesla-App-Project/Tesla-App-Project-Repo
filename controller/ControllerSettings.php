<?php

class ControllerSettings
{
    private HttpRequestHandlerModel $_httpRequestHandler;

    public function __construct()
    {
        $this->_httpRequestHandler = new HttpRequestHandlerModel();
    }

    /**
     * @API_route /api/1/vehicles/id_vehicle/data_request/gui_settings
     * @return void
     * @throws Exception
     */
    public function getDriveGUIDataAction() : void {
        echo $this->_httpRequestHandler->callAPI('getDriveGUIData', true);
    }

    /**
     * @API_route /api/1/vehicles/id_vehicle/mobile_enabled
     * @return void
     * @throws Exception
     */
    public function getIsMobileEnabledAction() : void {
        echo $this->_httpRequestHandler->callAPI('getIsMobileEnabled', true);
    }
}