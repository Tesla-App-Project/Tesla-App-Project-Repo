<?php

class HttpRequestHandlerModel
{
    /**
     * @param array $keys
     * @return array
     * @throws Exception
     */
    private function getPOSTParams(array $keys) : array {
        $POSTParams = [];
        foreach ($keys as $key){
            if (isset($_REQUEST[$key])) $POSTParams[$key] = $_REQUEST[$key];
            else throw new Exception('No matching value with key "' . $key . '".');
        }
        return $POSTParams;
    }

    /**
     * @param string $APICallFunction
     * @param bool $isGET
     * @return string|false
     * @throws Exception
     */
    public function callAPI(string $APICallFunction, bool $isGET) : bool|string {
        $apiModel = new ApiModel();
        if ($isGET) {
            $response = match ($APICallFunction) {
                'getAllVehicles' => $apiModel->getAllVehicles(),
                'getVehiculeData' => $apiModel->getVehiculeData(),
                'getChargeStateData' => $apiModel->getChargeStateData(),
                'getChargeClimateData' => $apiModel->getChargeClimateData(),
                'getDriveStateData' => $apiModel->getDriveStateData(),
                'getDriveGuiData' => $apiModel->getDriveGuiData(),
                'getIsMobileEnabled' => $apiModel->getIsMobileEnabled(),
                'getServiceData' => $apiModel->getServiceData(),
                'getVehicleData' => $apiModel->getVehicleData(),
                default => null,
            };
        }
        else {
            switch ($APICallFunction) {
                case 'postActuateTrunk' :
                    $response = $apiModel->postActuateTrunk();
                    break;
                case 'postConditioningStart' :
                    $response = $apiModel->postConditioningStart();
                    break;
                case 'postConditioningStop' :
                    $response = $apiModel->postConditioningStop();
                    break;
                case 'postChargeMaxRange' :
                    $response = $apiModel->postChargeMaxRange();
                    break;
                case 'postChargePortClose' :
                    $response = $apiModel->postChargePortClose();
                    break;
                case 'postChargePortOpen' :
                    $response = $apiModel->postChargePortOpen();
                    break;
                case 'postDoorLock' :
                    $response = $apiModel->postDoorLock();
                    break;
                case 'postDoorUnlock' :
                    $response = $apiModel->postDoorUnlock();
                    break;
                case 'postFlashLights' :
                    $response = $apiModel->postFlashLights();
                    break;
                case 'postHonkHorn' :
                    $response = $apiModel->postHonkHorn();
                    break;
                case 'postRemoteStartDrive' :
                    $response = $apiModel->postRemoteStartDrive();
                    break;
                case 'postResetValetPin' :
                    $response = $apiModel->postResetValetPin();
                    break;
                case 'postSetValetMode' :
                    $params = $this->getPOSTParams(['mode', 'password']);
                    $response = $apiModel->postSetValetMode($params['mode'], $params['password']);
                    break;
                case 'postSetChargeLimit' :
                    $params = $this->getPOSTParams(['percent']);
                    $response = $apiModel->postSetChargeLimit($params['percent']);
                    break;
                case 'postSetBothTemps' :
                    $params = $this->getPOSTParams(['driverTemp', 'passengerTemp']);
                    $response = $apiModel->postSetBothTemps($params['driverTemp'], $params['passengerTemp']);
                    break;
                case 'postSpeedLimitActivate' :
                    $response = $apiModel->postSpeedLimitActivate();
                    break;
                case 'postSpeedLimitDeactivate' :
                    $response = $apiModel->postSpeedLimitDeactivate();
                    break;
                case 'postSpeedLimitClearPin' :
                    $response = $apiModel->postSpeedLimitClearPin();
                    break;
                case 'postSpeedLimitSetLimit' :
                    $response = $apiModel->postSpeedLimitSetLimit();
                    break;
                case 'postStartCharge' :
                    $response = $apiModel->postStartCharge();
                    break;
                case 'postStopCharge' :
                    $response = $apiModel->postStopCharge();
                    break;
                case 'postSunRoofControl' :
                    $params = $this->getPOSTParams(['state', 'percent']);
                    $response = $apiModel->postSunRoofControl($params['state'], $params['percent']);
                    break;
                default :
                    $response = null;
                    break;
            }
        }
        return json_encode($response);
    }
}