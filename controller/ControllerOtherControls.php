<?php

use JetBrains\PhpStorm\Pure;

class ControllerOtherControls extends ControllerAPI
{
    /**
     * @API_route /api/1/vehicles/id_vehicle/command/flash_lights
     * @return void
     */
    public function postFlashLightsAction() : void {
        echo $this->_httpRequestHandler->callAPI('postFlashLights', false);
    }

    /**
     * @API_route /api/1/vehicles/id_vehicle/command/honk_horn
     * @return void
     */
    public function postHonkHornAction() : void {
        echo $this->_httpRequestHandler->callAPI('postHonkHorn', false);
    }

    /**
     * @API_route /api/1/vehicles/id_vehicle/command/remote_start_drive
     * @return void
     */
    public function postRemoteStartDriveAction() : void {
        echo $this->_httpRequestHandler->callAPI('postRemoteStartDrive', false);
    }
}