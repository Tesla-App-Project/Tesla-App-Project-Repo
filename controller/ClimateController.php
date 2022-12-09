<?php

class ClimateController
{
    /**
     * @API_route /api/1/vehicles/id_vehicle/data_request/climate_state
     * @return void
     */
    public function getChargeClimateState() : void {
        echo null;
    }

    //TODO : Rename this function when starting and stopping routes are put together
    /**
     * @API_route /api/1/vehicles/id_vehicle/command/auto_conditioning_start | /api/1/vehicles/id_vehicle/command/auto_conditioning_stop
     * @return void
     */
    public function postToggleConditioningState() : void {
        echo null;
    }

    /**
     * @API_route /api/1/vehicles/id_vehicle/command/set_temps
     * @return void
     */
    public function postSetBothTemps() : void {
        echo null;
    }
}