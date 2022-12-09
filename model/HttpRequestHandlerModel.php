<?php

class HttpRequestHandlerModel
{
    /**
     * @param string $paramKey
     * @param string $APICallFunction
     * @return void
     */
    public function handleHttpRequest(string $paramKey, string $APICallFunction, bool $isGET) : stdClass {

    }

    /**
     * @param array $keys
     * @return array
     */
    private function getPOSTParams(array $keys) : array {
        $POSTParams = [];
        foreach ($keys as $key){
            $POSTParams[] = $_REQUEST[$key];
        }
        return $POSTParams;
    }

    /**
     * @param string $APICallFunction
     * @return void
     * @throws Exception
     */
    private function callAPI(string $APICallFunction, bool $isGET) : void {
        $apiModel = new ApiModel();
        if ($isGET) {
            switch ($APICallFunction) {
                case 'getAllVehicles' :
                    $callResult = $apiModel->getAllVehicles();
                    break;
                case 'getVehiculeData' :
                    $callResult = $apiModel->getVehiculeData();
                    break;
                default :
                    $callResult = null;
                    break;
            }
        }
        else {
            switch ($APICallFunction) {
                case 'postActuateTrunk' :
                    $callResult = $apiModel->postActuateTrunk();
                    break;
                default :
                    $callResult = null;
                    break;
            }
        }
    }
//getAllVehicles()
//getVehiculeData()
//getChargeStateData()
//getChargeClimateData()
//getDriveStateData()
//getDriveGuiData()
//getIsMobileEnabled()
//getServiceData()
//getVehicleData()

//postActuateTrunk()
//postConditioningStart()
//postConditioningStop()
//postChargeMaxRange()
//postChargePortClose()
//postChargePortOpen()
//postDoorLock()
//postDoorUnlock()
//postFlashLights()
//postHonkHorn()
//postRemoteStartDrive()
//postResetValetPin()
//postSetValetMode(bool $mode, string $password)
//postSetChargeLimit(int $percent)
//postSetBothTemps()
//postSpeedLimitActivate()
//postSpeedLimitDeactivate()
//postSpeedLimitClearPin()
//postSpeedLimitSetLimit()
//postStartCharge()
//postStopCharge()
//postSunRoofControl()
}