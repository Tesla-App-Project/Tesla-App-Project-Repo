<?php

class HttpRequestHandlerModel
{
    private string $_token;

    public function __construct($token) {
        $this->_token = $token;
    }

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
     * @return string|false Either the API response as a string-represented JSON or false if the call fails due to a wrong route or missing argument
     */
    public function callAPI(string $APICallFunction, bool $isGET) : string|bool {
        $apiModel = new ApiModel();
        $apiModel->setToken($this->_token);

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
                'isCharging' => $apiModel->isCharging(),
                default => null,
            };
        }
        else {
            switch ($APICallFunction) {
                case 'postActuateTrunk(front)' :
                    $response = $apiModel->postActuateTrunk("front");
                    break;
                case 'postActuateTrunk(rear)' :
                    $response = $apiModel->postActuateTrunk("rear");
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
                    try {
                        $params = $this->getPOSTParams(['mode', 'password']);
                        $response = $apiModel->postSetValetMode($params['mode'], $params['password']);
                    } catch (Exception $e) {
                        $response = false;
                        echo $e->getMessage();
                    }
                    break;
                case 'postSetChargeLimit' :
                    try {
                        $params = $this->getPOSTParams(['percent']);
                        $response = $apiModel->postSetChargeLimit($params['percent']);
                    } catch (Exception $e) {
                        $response = false;
                        echo $e->getMessage();
                    }
                    break;
                case 'postSetBothTemps' :
                    try {
                        $params = $this->getPOSTParams(['driverTemp', 'passengerTemp']);
                        $response = $apiModel->postSetBothTemps($params['driverTemp'], $params['passengerTemp']);
                    } catch (Exception $e) {
                        $response = false;
                        echo $e->getMessage();
                    }
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
                    try {
                        $params = $this->getPOSTParams(['state', 'percent']);
                        $response = $apiModel->postSunRoofControl($params['state'], $params['percent']);
                    } catch (Exception $e) {
                        $response = false;
                        echo $e->getMessage();
                    }
                    break;
                default :
                    $response = null;
                    break;
            }
        }
        return json_encode($response);
    }
}