<?php

use JetBrains\PhpStorm\Pure;

class ChargeController
{
    private HttpRequestHandlerModel $_httpRequestHandler;

    #[Pure] public function __construct()
    {
        $this->_httpRequestHandler = new HttpRequestHandlerModel();
    }

    /**
     * @API_route /api/1/vehicles/id_vehicle/data_request/charge_state
     * @return void
     * @throws Exception
     */
    public function getChargeStateDataAction() : void {
        echo $this->_httpRequestHandler->callAPI('getChargeStateData', true);
    }

    /**
     * @API_route /api/1/vehicles/id_vehicle/command/charge_max_range
     * @return void
     * @throws Exception
     */
    public function postChargeMaxRangeAction() : void {
        echo $this->_httpRequestHandler->callAPI('postChargeMaxRange', false);
    }

    //TODO : Rename this function when opening and closing routes are used together

    /**
     * @API_route /api/1/vehicles/id_vehicle/command/charge_port_door_open | /api/1/vehicles/id_vehicle/command/charge_port_door_close
     * @return void
     * @throws Exception
     */
    public function postActuateChargePortAction() : void {
        echo $this->_httpRequestHandler->callAPI('postActuateChargePort', false);
    }

    /**
     * @API_route /api/1/vehicles/id_vehicle/command/set_charge_limit
     * @return void
     * @throws Exception
     */
    public function postSetChargeLimitAction() : void {
        echo $this->_httpRequestHandler->callAPI('postSetChargeLimit', false);
    }

    //TODO : Rename this function when starting and stopping routes are put together

    /**
     * @API_route /api/1/vehicles/id_vehicle/command/start_charge | /api/1/vehicles/id_vehicle/command/stop_charge
     * @return void
     * @throws Exception
     */
    public function postToggleChargeStatAction() : void {
        echo $this->_httpRequestHandler->callAPI('postToggleChargeStat', false);
    }
}