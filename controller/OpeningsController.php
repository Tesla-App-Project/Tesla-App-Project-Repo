<?php

use JetBrains\PhpStorm\Pure;

class OpeningsController
{
    private HttpRequestHandlerModel $_httpRequestHandler;

    #[Pure] public function __construct()
    {
        $this->_httpRequestHandler = new HttpRequestHandlerModel();
    }

    //TODO : Rename this function when locking and unlocking routes are used together

    /**
     * @API_route /api/1/vehicles/id_vehicle/command/door_lock | /api/1/vehicles/id_vehicle/command/door_unlock
     * @return void
     * @throws Exception
     */
    public function postActuateDoorLockAction() : void {
        echo $this->_httpRequestHandler->callAPI('postActuateDoorLock', false);
    }

    /**
     * @API_route /api/1/vehicles/id_vehicle/command/actuate_trunk
     * @return void
     * @throws Exception
     */
    public function postActuateTrunkAction() : void {
        echo $this->_httpRequestHandler->callAPI('postActuateTrunk', false);
    }

    /**
     * @API_route /api/1/vehicles/id_vehicle/command/sun_roof_control
     * @return void
     * @throws Exception
     */
    public function postSunRoofControlAction() : void {
        echo $this->_httpRequestHandler->callAPI('postSunRoofControl', false);
    }
}