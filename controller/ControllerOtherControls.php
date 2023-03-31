<?php

use JetBrains\PhpStorm\Pure;

class ControllerOtherControls extends ControllerAPI
{
    /**
     * @API_route /api/1/vehicles/id_vehicle/
     * @return void
     */
    public function defautAction() : void {
        $A_content = [
            'header' => 'test',
            'content' => 'OtherControlsView',
            'footer' => 'test',
            'servAdresse' => $this->servAdresse,
            'isCharging' => $this->_httpRequestHandler->callAPI('isCharging'),
            'isFrontTrunkOpen' => $this->_httpRequestHandler->callAPI('isTrunkOpen', ['whichTrunk' => 'front']),
            'isRearTrunkOpen' => $this->_httpRequestHandler->callAPI('isTrunkOpen', ['whichTrunk' => 'rear']),
            'isVehicleLocked' => $this->_httpRequestHandler->callAPI('isVehicleLocked'),
        ];
        View::show('control', $A_content);
    }

    /**
     * @API_route /api/1/vehicles/id_vehicle/command/flash_lights
     * @return void
     */
    public function postFlashLightsAction() : void {
        echo $this->_httpRequestHandler->callAPI('postFlashLights');
    }

    /**
     * @API_route /api/1/vehicles/id_vehicle/command/honk_horn
     * @return void
     */
    public function postHonkHornAction() : void {
        echo $this->_httpRequestHandler->callAPI('postHonkHorn' );
    }

    /**
     * @API_route /api/1/vehicles/id_vehicle/command/remote_start_drive
     * @return void
     */
    public function postRemoteStartDriveAction() : void {
        echo $this->_httpRequestHandler->callAPI('postRemoteStartDrive');
    }
}