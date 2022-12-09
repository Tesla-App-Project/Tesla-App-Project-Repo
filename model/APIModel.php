<?php

class APIModel
{
    private $token;
    private $baseURL = 'http:/78.123.242.51:25000/api/1/vehicles';

    private function setToken() {

        // TODO : DB Request to fetch encrypted token
        // Then decrypt it

        $this->token = "letokendelatesla";
    }
    /**
     * @param string | null $idCar id of the car you wish to interact with
     * @param string $url api endpoint url
     * @param string $requestType request type : GET or POST
     * @return array
     */

    private function makeAPIRequest(string | null $idCar, string $url, string $requestType): array {

        // Token assignment
        $this->setToken();
        //$this->postWakeUp();

        // TODO : alexlebg has to be replaced by the actual car's id
        // One person can own multiple cars

        $idCar === null ? $urlRequest = "{$this->baseURL}/" : $urlRequest = "{$this->baseURL}/{$idCar}/{$url}";

        $ch = curl_init();

        // Check if initialization had gone wrong*    
        if ($ch === false) {
            throw new Exception('failed to initialize');
        }

        curl_setopt($ch, CURLOPT_URL, $urlRequest);

        // Bearer token and data type

        $headers = [];
        $headers[] = 'Content-Type: application/json; charset=utf-8';
        $headers[] = "Authorization: Bearer {$this->token}";
    
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $requestType);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

        try {
            $result = curl_exec($ch);
        } catch (Exception $e) {
            var_dump($e->getCode() . " " . $e->getMessage());
        } finally {
            curl_close($ch);
            return json_decode($result, true);
        }   
    }


    // <------------------- GET methods ------------------->

    /**
     * @return array
     */
    public function getAllVehicles(): array {
        return $this->makeAPIRequest(null, "", "GET");
    }

    /**
     * @return array
     */
    public function getVehiculeData(): array {
        return $this->makeAPIRequest("alexlebg", "", "GET");
    }

    /**
     * @return array
     */
    public function getAllData(): array {
        return $this->makeAPIRequest("alexlebg", "data", "GET");
    }

    /**
     * @return array
     */
    public function getChargeStateData(): array {
        return $this->makeAPIRequest("alexlebg", "data_request/charge_state", "GET");
    }

    /**
     * @return array
     */
    public function getChargeClimateData(): array {
        return $this->makeAPIRequest("alexlebg", "data_request/climate_state", "GET");
    }

    /**
     * @return array
     */
    public function getDriveStateData(): array {
        return $this->makeAPIRequest("alexlebg", "data_request/drive_state", "GET");
    }

    /**
     * @return array
     */
    public function getDriveGuiData(): array {
        return $this->makeAPIRequest("alexlebg", "data_request/gui_settings", "GET");
    }

    /**
     * @return array
     */
    public function getIsMobileEnabled(): array {
        return $this->makeAPIRequest("alexlebg", "mobile_enabled", "GET");
    }

    /**
     * @return array
     */
    public function getServiceData(): array {
        return $this->makeAPIRequest("alexlebg", "service_data", "GET");
    }

    /**
     * @return array
     */
    public function getVehicleData(): array {
        return $this->makeAPIRequest("alexlebg", "vehicle_data", "GET");
    }
    
    // <------------------- POST methods ------------------->

    /**
     * @return bool
     */
    public function postWakeUp(): bool {
        $result = $this->makeAPIRequest("alexlebg", "wake_up" , "POST");
        if ($result["response"][0]["state"] === "online") {
            return true;
        } else {
            return false;
        };
    }

    /**
     * @return array
     */
    public function postActuateTrunk(): array {
        $result = $this->makeAPIRequest("alexlebg", "command/actuate_trunk" , "POST")["response"]["result"];
        $reason = $this->makeAPIRequest("alexlebg", "command/actuate_trunk" , "POST")["response"]["reason"];
        return array("result" => $result,"reason" => $reason);
    }

    /**
     * @return array
     */
    public function postConditioningStart(): array {
        $result = $this->makeAPIRequest("alexlebg", "command/auto_conditioning_start" , "POST")["response"]["result"];
        $reason = $this->makeAPIRequest("alexlebg", "command/auto_conditioning_start" , "POST")["response"]["reason"];
        return array("result" => $result,"reason" => $reason);
    }

    /**
     * @return array
     */
    public function postConditioningStop(): array {
        $result = $this->makeAPIRequest("alexlebg", "command/auto_conditioning_stop" , "POST")["response"]["result"];
        $reason = $this->makeAPIRequest("alexlebg", "command/auto_conditioning_stop" , "POST")["response"]["reason"];
        return array("result" => $result,"reason" => $reason);
    }

    /**
     * @return array
     */
    public function postChargeMaxRange(): array {
        $result = $this->makeAPIRequest("alexlebg", "command/charge_max_range" , "POST")["response"]["result"];
        $reason = $this->makeAPIRequest("alexlebg", "command/charge_max_range" , "POST")["response"]["reason"];
        return array("result" => $result,"reason" => $reason);
    }

    /**
     * @return array
     */
    public function postChargePortClose(): array {
        $result = $this->makeAPIRequest("alexlebg", "command/charge_port_door_close" , "POST")["response"]["result"];
        $reason = $this->makeAPIRequest("alexlebg", "command/charge_port_door_close" , "POST")["response"]["reason"];
        return array("result" => $result,"reason" => $reason);
    }

    /**
     * @return array
     */
    public function postChargePortOpen(): array {
        $result = $this->makeAPIRequest("alexlebg", "command/charge_port_door_open" , "POST")["response"]["result"];
        $reason = $this->makeAPIRequest("alexlebg", "command/charge_port_door_open" , "POST")["response"]["reason"];
        return array("result" => $result,"reason" => $reason);
    }

    /**
     * @return array
     */
    public function postDoorLock(): array {
        $result = $this->makeAPIRequest("alexlebg", "command/door_lock" , "POST")["response"]["result"];
        $reason = $this->makeAPIRequest("alexlebg", "command/door_lock" , "POST")["response"]["reason"];
        return array("result" => $result,"reason" => $reason);
    }

    /**
     * @return array
     */
    public function postDoorUnlock(): array {
        $result = $this->makeAPIRequest("alexlebg", "command/door_unlock" , "POST")["response"]["result"];
        $reason = $this->makeAPIRequest("alexlebg", "command/door_unlock" , "POST")["response"]["reason"];
        return array("result" => $result,"reason" => $reason);
    }

    /**
     * @return array
     */
    public function postFlashLights(): array {
        $result = $this->makeAPIRequest("alexlebg", "command/flash_lights" , "POST")["response"]["result"];
        $reason = $this->makeAPIRequest("alexlebg", "command/flash_lights" , "POST")["response"]["reason"];
        return array("result" => $result,"reason" => $reason);
    }

    /**
     * @return array
     */
    public function postHonkHorn(): array {
        $result = $this->makeAPIRequest("alexlebg", "command/honk_horn" , "POST")["response"]["result"];
        $reason = $this->makeAPIRequest("alexlebg", "command/honk_horn" , "POST")["response"]["reason"];
        return array("result" => $result,"reason" => $reason);
    }

    /**
     * @return array
     */
    public function postRemoteStartDrive(): array {
        $result = $this->makeAPIRequest("alexlebg", "command/remote_start_drive" , "POST")["response"]["result"];
        $reason = $this->makeAPIRequest("alexlebg", "command/remote_start_drive" , "POST")["response"]["reason"];
        return array("result" => $result,"reason" => $reason);
    }

    /**
     * @return array
     */
    public function postResetValetPin(): array {
        $result = $this->makeAPIRequest("alexlebg", "command/reset_valet_pin" , "POST")["response"]["result"];
        $reason = $this->makeAPIRequest("alexlebg", "command/reset_valet_pin" , "POST")["response"]["reason"];
        return array("result" => $result,"reason" => $reason);
    }

    /**
     * @param bool $mode whether to set the mode on or off
     * @param string $password the user password
     * @return array
     */
    public function postSetValetMode(bool $mode, string $password): array {
        $result = $this->makeAPIRequest("alexlebg", "command/set_valet_mode?on={$mode}&password={$password}", "POST")["response"]["result"];
        $reason = $this->makeAPIRequest("alexlebg", "command/set_valet_mode?on={$mode}&password={$password}", "POST")["response"]["reason"];
        return array("result" => $result,"reason" => $reason);
    }

    /**
     * @param int $percent charge limit percentage
     * @return array
     */
    public function postSetChargeLimit(int $percent): array {
        $result = $this->makeAPIRequest("alexlebg", "command/set_charge_limit?percent={$percent}" , "POST")["response"]["result"];
        $reason = $this->makeAPIRequest("alexlebg", "command/set_charge_limit?percent={$percent}" , "POST")["response"]["reason"];
        return array("result" => $result,"reason" => $reason);
    }

    /**
     * @param int | null $driverTemp driver HVAC temp
     * @param int | null $passengerTemp passenger HVAC temp
     * @return array
     * @todo Verify if API takes null as parameter
     */
    public function postSetBothTemps(int | null $driverTemp, int | null $passengerTemp): array {
        $result = $this->makeAPIRequest("alexlebg", "command/set_temps?driver_temp={$driverTemp}&passenger_temp={$passengerTemp}", "POST")["response"]["result"];
        $reason = $this->makeAPIRequest("alexlebg", "command/set_temps?driver_temp={$driverTemp}&passenger_temp={$passengerTemp}", "POST")["response"]["reason"];
        return array("result" => $result,"reason" => $reason);
    }

    /**
     * @return array
     */
    public function postSpeedLimitActivate(): array {
        $result = $this->makeAPIRequest("alexlebg", "command/speed_limit_activate" , "POST")["response"]["result"];
        $reason = $this->makeAPIRequest("alexlebg", "command/speed_limit_activate" , "POST")["response"]["reason"];
        return array("result" => $result,"reason" => $reason);
    }

    /**
     * @return array
     */
    public function postSpeedLimitDeactivate(): array {
        $result = $this->makeAPIRequest("alexlebg", "command/speed_limit_deactivate" , "POST")["response"]["result"];
        $reason = $this->makeAPIRequest("alexlebg", "command/speed_limit_deactivate" , "POST")["response"]["reason"];
        return array("result" => $result,"reason" => $reason);
    }

    /**
     * @return array
     */
    public function postSpeedLimitClearPin(): array {
        $result = $this->makeAPIRequest("alexlebg", "command/speed_limit_clear_pin" , "POST")["response"]["result"];
        $reason = $this->makeAPIRequest("alexlebg", "command/speed_limit_clear_pin" , "POST")["response"]["reason"];
        return array("result" => $result,"reason" => $reason);
    }

    /**
     * @return array
     */
    public function postSpeedLimitSetLimit(): array {
        $result = $this->makeAPIRequest("alexlebg", "command/speed_limit_set_limit" , "POST")["response"]["result"];
        $reason = $this->makeAPIRequest("alexlebg", "command/speed_limit_set_limit" , "POST")["response"]["reason"];
        return array("result" => $result,"reason" => $reason);
    }

    /**
     * @return array
     */
    public function postStartCharge(): array {
        $result = $this->makeAPIRequest("alexlebg", "command/start_charge" , "POST")["response"]["result"];
        $reason = $this->makeAPIRequest("alexlebg", "command/start_charge" , "POST")["response"]["reason"];
        return array("result" => $result,"reason" => $reason);
    }

    /**
     * @return array
     */
    public function postStopCharge(): array {
        $result = $this->makeAPIRequest("alexlebg", "command/start_stop" , "POST")["response"]["result"];
        $reason = $this->makeAPIRequest("alexlebg", "command/start_stop" , "POST")["response"]["reason"];
        return array("result" => $result,"reason" => $reason);
    }

    /**
     * To use it, either pass one of the specified strings, or pass the corresponding number, or use move with a custom percentage.
     * eg : open => 100%, closed => 0%, comfort => 80%, vent => 15% and indicate move for a custom percent.
     * If you are using a different state than move, you don't need to pass a percent as parameter - pass null
     * @param string $state
     * @param int | null $percent
     * @return array
     * @todo Verify if API takes null as parameter
     */
    public function postSunRoofControl(string $state, int | null $percent): array {
        $result = $this->makeAPIRequest("alexlebg", "command/sun_roof_control?state={$state}&percent={$percent}" , "POST")["response"]["result"];
        $reason = $this->makeAPIRequest("alexlebg", "command/sun_roof_control?state={$state}&percent={$percent}" , "POST")["response"]["reason"];
        return array("result" => $result,"reason" => $reason);
    }

}