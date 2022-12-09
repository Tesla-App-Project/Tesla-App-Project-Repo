<?php

class ChargeController
{
    /**
     * @API_route /api/1/vehicles/id_vehicle/command/charge_max_range
     * @return void
     */
    public function setMaxRange() : void {
        echo null;
    }

    /**
     * @API_route /api/1/vehicles/id_vehicle/command/charge_port_door_open | /api/1/vehicles/id_vehicle/command/charge_port_door_close
     * @return void
     */
    public function actuatePort() : void {
        echo null;
    }

    /**
     * @API_route /api/1/vehicles/id_vehicle/command/set_charge_limit
     * @return void
     */
    public function setLimit() : void {
        echo null;
    }

    /**
     * @API_route /api/1/vehicles/id_vehicle/command/start_charge
     * @return void
     */
    public function start() : void {
        echo null;
    }
}