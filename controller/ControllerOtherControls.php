<?php



class ControllerOtherControls extends ControllerAPI
{
    /**
     * @API_route /api/1/vehicles/id_vehicle/
     * @return void
     */
    public function defautAction() : void {

        if(!isset($_SESSION['isLogged'])) {
            header("Location: /");
            exit;
        }

        if(!$_SESSION['token']){
            View::show('popup', array());
            return;
        }

        $allData = json_decode($this->_httpRequestHandler->callAPI('getAllData'), true)['response'];

        $isFrontTrunkOpen = !($allData['vehicle_state']['ft'] === 0);
        $isRearTrunkOpen = !($allData['vehicle_state']['rt'] === 0);

        $convert = array(
            "Disconnected" => false,
            "Complete" => false,
            "Charging" => true
        );
        $isCharging = $convert[$allData['charge_state']['charging_state']];

        $isVehicleLocked = $allData["vehicle_state"]["locked"];

        $A_content = [
            'header' => 'test',
            'content' => 'OtherControlsView',
            'footer' => 'test',
            'servAdresse' => $this->servAdresse,
            //'isCharging' => $this->_httpRequestHandler->callAPI('isCharging'),
            'isCharging' => $isCharging,
            //'isFrontTrunkOpen' => $this->_httpRequestHandler->callAPI('isTrunkOpen', ['whichTrunk' => 'front']),
            //'isRearTrunkOpen' => $this->_httpRequestHandler->callAPI('isTrunkOpen', ['whichTrunk' => 'rear']),
            'isFrontTrunkOpen' => $isFrontTrunkOpen,
            'isRearTrunkOpen' => $isRearTrunkOpen,
            //'isVehicleLocked' => $this->_httpRequestHandler->callAPI('isVehicleLocked'),
            'isVehicleLocked' => $isVehicleLocked,
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