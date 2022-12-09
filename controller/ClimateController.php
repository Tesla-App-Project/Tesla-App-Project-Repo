<?php

class ClimateController
{
    /**
     * @API_route /api/1/vehicles/id_vehicle/data_request/climate_state
     * @return void
     */
    public function getClimateState() : void {
        echo null;
    }

    /**
     * @API_route /api/1/vehicles/id_vehicle/command/auto_conditioning_start | /api/1/vehicles/id_vehicle/command/auto_conditioning_stop
     * @return void
     */
    public function actuateConditioning() : void {
        echo null;
    }

    /**
     * @API_route /api/1/vehicles/id_vehicle/command/set_temps
     * @return void
     */
    public function setTemps() : void {
        echo null;
    }
}