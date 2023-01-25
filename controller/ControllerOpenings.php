<?php

use JetBrains\PhpStorm\Pure;

class ControllerOpenings extends ControllerAPI
{
    //TODO : Rename this function when locking and unlocking routes are used together
    /**
     * @API_route /api/1/vehicles/id_vehicle/command/door_lock | /api/1/vehicles/id_vehicle/command/door_unlock
     * @return void
     */
    public function postActuateDoorLockAction() : void {
        echo $this->_httpRequestHandler->callAPI('postActuateDoorLock', false);
    }

    /**
     * @API_route /api/1/vehicles/id_vehicle/command/actuate_trunk
     * @return void
     */
    public function postActuateFrontAction() : void {
        echo $this->_httpRequestHandler->callAPI('postActuateTrunk(front)', false);
    }

    /**
     * @API_route /api/1/vehicles/id_vehicle/command/actuate_trunk
     * @return void
     */
    public function postActuateRearAction() : void {
        echo $this->_httpRequestHandler->callAPI('postActuateTrunk(rear)', false);
    }

    /**
     * @API_route /api/1/vehicles/id_vehicle/command/sun_roof_control
     * @return void
     */
    public function postSunRoofControlAction() : void {
        echo $this->_httpRequestHandler->callAPI('postSunRoofControl', false);
    }
}