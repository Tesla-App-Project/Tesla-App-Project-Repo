<?php

use JetBrains\PhpStorm\Pure;

class ControllerClimate extends ControllerAPI
{
    /**
     * @API_route /api/1/vehicles/id_vehicle/data_request/climate_state
     * @return void
     */
    public function getChargeClimateStateAction() : void {
        echo $this->_httpRequestHandler->callAPI('getChargeClimateState', true);
    }

    //TODO : Rename this function when starting and stopping routes are put together
    /**
     * @API_route /api/1/vehicles/id_vehicle/command/auto_conditioning_start | /api/1/vehicles/id_vehicle/command/auto_conditioning_stop
     * @return void
     */
    public function postToggleConditioningStateAction() : void {
        //echo $this->_httpRequestHandler->callAPI('postToggleConditioningState', false);
        echo $this->_httpRequestHandler->callAPI('postConditioningStart', false);
    }

    /**
     * @API_route /api/1/vehicles/id_vehicle/command/set_temps
     * @return void
     */
    public function postSetBothTempsAction() : void {
        echo $this->_httpRequestHandler->callAPI('postSetBothTemps', false);
    }
}