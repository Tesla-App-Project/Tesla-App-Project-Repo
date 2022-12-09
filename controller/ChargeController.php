<?php

class ChargeController
{
    /**
     * @API_route /api/1/vehicles/id_vehicle/data_request/charge_state
     * @return void
     */
    public function getChargeStateData() : void {
        echo null;
    }

    /**
     * @API_route /api/1/vehicles/id_vehicle/command/charge_max_range
     * @return void
     */
    public function postChargeMaxRange() : void {
        echo null;
    }

    //TODO : Rename this function when opening and closing routes are used together
    /**
     * @API_route /api/1/vehicles/id_vehicle/command/charge_port_door_open | /api/1/vehicles/id_vehicle/command/charge_port_door_close
     * @return void
     */
    public function postActuateChargePort() : void {
        echo null;
    }

    /**
     * @API_route /api/1/vehicles/id_vehicle/command/set_charge_limit
     * @return void
     */
    public function postSetChargeLimit() : void {
        echo null;
    }

    //TODO : Rename this function when starting and stopping routes are put together
    /**
     * @API_route /api/1/vehicles/id_vehicle/command/start_charge | /api/1/vehicles/id_vehicle/command/stop_charge
     * @return void
     */
    public function postToggleChargeStat() : void {
        echo null;
    }
}