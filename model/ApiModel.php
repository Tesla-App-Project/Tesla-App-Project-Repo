<?php

class ApiModel
{
    private $token;
    private string $baseURL = 'http:/78.123.242.51:25000/api/1/vehicles';

    /**
     * Allows you to set a token
     * @param string $tokenTesla
     * @return void
     */
    public function setToken(string $tokenTesla): void
    {

        // TODO : DB Request to fetch encrypted token
        // Then decrypt it

        $this->token = $tokenTesla;
    }

    /**
     * Allows you to revoke the current token
     * @return void
     */
    public function revokeToken(): void
    {

        $this->setToken("");
    }

    /**
     * @param string | null $idCar id of the car you wish to interact with
     * @param string $url api endpoint url
     * @param string $requestType request type : GET or POST
     * @return array
     * @throws Exception
     */

    private function makeAPIRequest(string | null $idCar, string $url, string $requestType): array {

        // Token assignment
        //$this->setToken("letokendelatesla");
        //$this->postWakeUp();

        // TODO : 1493131276665295 has to be replaced by the actual car's id
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
        return $this->makeAPIRequest("1493131276665295", "", "GET");
    }

    /**
     * @return array
     */
    public function getAllData(): array {
        return $this->makeAPIRequest("1493131276665295", "data", "GET");
    }

    /**
     * @return array
     */
    public function getChargeStateData(): array {
        return $this->makeAPIRequest("1493131276665295", "data_request/charge_state", "GET");
    }

    /**
     * @return array
     */
    public function getChargeClimateData(): array {
        return $this->makeAPIRequest("1493131276665295", "data_request/climate_state", "GET");
    }

    /**
     * @return array
     */
    public function getDriveStateData(): array {
        return $this->makeAPIRequest("1493131276665295", "data_request/drive_state", "GET");
    }

    /**
     * @return array
     */
    public function getDriveGuiData(): array {
        return $this->makeAPIRequest("1493131276665295", "data_request/gui_settings", "GET");
    }

    /**
     * @return array
     */
    public function getIsMobileEnabled(): array {
        return $this->makeAPIRequest("1493131276665295", "mobile_enabled", "GET");
    }

    /**
     * @return array
     */
    public function getServiceData(): array {
        return $this->makeAPIRequest("1493131276665295", "service_data", "GET");
    }

    /**
     * @return array
     */
    public function getVehicleData(): array {
        return $this->makeAPIRequest("1493131276665295", "vehicle_data", "GET");
    }

    // <------------------- POST methods ------------------->

    /**
     * @return bool
     * @throws Exception
     */
    public function postWakeUp(): bool {
        $result = $this->makeAPIRequest("1493131276665295", "wake_up" , "POST");
        if ($result["response"][0]["state"] === "online") {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return array
     */
    public function postActuateTrunk(): array {
        if($this->postWakeUp()) {
            $result = $this->makeAPIRequest("1493131276665295", "command/actuate_trunk" , "POST")["response"]["result"];
            $reason = $this->makeAPIRequest("1493131276665295", "command/actuate_trunk" , "POST")["response"]["reason"];
            return array("result" => $result,"reason" => $reason);
        }
        return array("reason" => "La voiture n'est pas apte à recevoir d'ordre");
    }

    /**
     * @return array
     */
    public function postConditioningStart(): array {
        if($this->postWakeUp()) {
            $result = $this->makeAPIRequest("1493131276665295", "command/auto_conditioning_start" , "POST")["response"]["result"];
            $reason = $this->makeAPIRequest("1493131276665295", "command/auto_conditioning_start" , "POST")["response"]["reason"];
            return array("result" => $result,"reason" => $reason);
        }
        return array("reason" => "La voiture n'est pas apte à recevoir d'ordre");
    }

    /**
     * @return array
     */
    public function postConditioningStop(): array {
        if($this->postWakeUp()) {
            $result = $this->makeAPIRequest("1493131276665295", "command/auto_conditioning_stop" , "POST")["response"]["result"];
            $reason = $this->makeAPIRequest("1493131276665295", "command/auto_conditioning_stop" , "POST")["response"]["reason"];
            return array("result" => $result,"reason" => $reason);
        }
        return array("reason" => "La voiture n'est pas apte à recevoir d'ordre");
    }

    /**
     * @return array
     */
    public function postChargeMaxRange(): array {
        if($this->postWakeUp()) {
            $result = $this->makeAPIRequest("1493131276665295", "command/charge_max_range" , "POST")["response"]["result"];
            $reason = $this->makeAPIRequest("1493131276665295", "command/charge_max_range" , "POST")["response"]["reason"];
            return array("result" => $result,"reason" => $reason);
        }
        return array("reason" => "La voiture n'est pas apte à recevoir d'ordre");
    }

    /**
     * @return array
     */
    public function postChargePortClose(): array {
        if($this->postWakeUp()) {
            $result = $this->makeAPIRequest("1493131276665295", "command/charge_port_door_close" , "POST")["response"]["result"];
            $reason = $this->makeAPIRequest("1493131276665295", "command/charge_port_door_close" , "POST")["response"]["reason"];
            return array("result" => $result,"reason" => $reason);
        }
        return array("reason" => "La voiture n'est pas apte à recevoir d'ordre");
    }

    /**
     * @return array
     */
    public function postChargePortOpen(): array {
        if($this->postWakeUp()) {
            $result = $this->makeAPIRequest("1493131276665295", "command/charge_port_door_open" , "POST")["response"]["result"];
            $reason = $this->makeAPIRequest("1493131276665295", "command/charge_port_door_open" , "POST")["response"]["reason"];
            return array("result" => $result,"reason" => $reason);
        }
        return array("reason" => "La voiture n'est pas apte à recevoir d'ordre");
    }

    /**
     * @return array
     */
    public function postDoorLock(): array {
        if($this->postWakeUp()) {
            $result = $this->makeAPIRequest("1493131276665295", "command/door_lock" , "POST")["response"]["result"];
            $reason = $this->makeAPIRequest("1493131276665295", "command/door_lock" , "POST")["response"]["reason"];
            return array("result" => $result,"reason" => $reason);
        }
        return array("reason" => "La voiture n'est pas apte à recevoir d'ordre");
    }

    /**
     * @return array
     */
    public function postDoorUnlock(): array {
        if($this->postWakeUp()) {
            $result = $this->makeAPIRequest("1493131276665295", "command/door_unlock" , "POST")["response"]["result"];
            $reason = $this->makeAPIRequest("1493131276665295", "command/door_unlock" , "POST")["response"]["reason"];
            return array("result" => $result,"reason" => $reason);
        }
        return array("reason" => "La voiture n'est pas apte à recevoir d'ordre");
    }

    /**
     * @return array
     */
    public function postFlashLights(): array {
        if($this->postWakeUp()) {
            $result = $this->makeAPIRequest("1493131276665295", "command/flash_lights" , "POST")["response"]["result"];
            $reason = $this->makeAPIRequest("1493131276665295", "command/flash_lights" , "POST")["response"]["reason"];
            return array("result" => $result,"reason" => $reason);
        }
        return array("reason" => "La voiture n'est pas apte à recevoir d'ordre");
    }

    /**
     * @return array
     */
    public function postHonkHorn(): array {
        if($this->postWakeUp()) {
            $result = $this->makeAPIRequest("1493131276665295", "command/honk_horn" , "POST")["response"]["result"];
            $reason = $this->makeAPIRequest("1493131276665295", "command/honk_horn" , "POST")["response"]["reason"];
            return array("result" => $result,"reason" => $reason);
        }
        return array("reason" => "La voiture n'est pas apte à recevoir d'ordre");
    }

    /**
     * @return array
     */
    public function postRemoteStartDrive(): array {
        if($this->postWakeUp()) {
            $result = $this->makeAPIRequest("1493131276665295", "command/remote_start_drive" , "POST")["response"]["result"];
            $reason = $this->makeAPIRequest("1493131276665295", "command/remote_start_drive" , "POST")["response"]["reason"];
            return array("result" => $result,"reason" => $reason);
        }
        return array("reason" => "La voiture n'est pas apte à recevoir d'ordre");
    }

    /**
     * @return array
     */
    public function postResetValetPin(): array {
        if($this->postWakeUp()) {
            $result = $this->makeAPIRequest("1493131276665295", "command/reset_valet_pin" , "POST")["response"]["result"];
            $reason = $this->makeAPIRequest("1493131276665295", "command/reset_valet_pin" , "POST")["response"]["reason"];
            return array("result" => $result,"reason" => $reason);
        }
        return array("reason" => "La voiture n'est pas apte à recevoir d'ordre");
    }

    /**
     * @param bool $mode whether to set the mode on or off
     * @param string $password the user password
     * @return array
     */
    public function postSetValetMode(bool $mode, string $password): array {
        if($this->postWakeUp()) {
            $result = $this->makeAPIRequest("1493131276665295", "command/set_valet_mode?on={$mode}&password={$password}", "POST")["response"]["result"];
            $reason = $this->makeAPIRequest("1493131276665295", "command/set_valet_mode?on={$mode}&password={$password}", "POST")["response"]["reason"];
            return array("result" => $result,"reason" => $reason);
        }
        return array("reason" => "La voiture n'est pas apte à recevoir d'ordre");
    }

    /**
     * @param int $percent charge limit percentage
     * @return array
     */
    public function postSetChargeLimit(int $percent): array {
        if($this->postWakeUp()) {
            $result = $this->makeAPIRequest("1493131276665295", "command/set_charge_limit?percent={$percent}" , "POST")["response"]["result"];
            $reason = $this->makeAPIRequest("1493131276665295", "command/set_charge_limit?percent={$percent}" , "POST")["response"]["reason"];
            return array("result" => $result,"reason" => $reason);
        }
        return array("reason" => "La voiture n'est pas apte à recevoir d'ordre");
    }

    /**
     * @param int | null $driverTemp driver HVAC temp
     * @param int | null $passengerTemp passenger HVAC temp
     * @return array
     * @todo Verify if API takes null as parameter
     */
    public function postSetBothTemps(int | null $driverTemp, int | null $passengerTemp): array {
        if($this->postWakeUp()) {
            $result = $this->makeAPIRequest("1493131276665295", "command/set_temps?driver_temp={$driverTemp}&passenger_temp={$passengerTemp}", "POST")["response"]["result"];
            $reason = $this->makeAPIRequest("1493131276665295", "command/set_temps?driver_temp={$driverTemp}&passenger_temp={$passengerTemp}", "POST")["response"]["reason"];
            return array("result" => $result,"reason" => $reason);
        }
        return array("reason" => "La voiture n'est pas apte à recevoir d'ordre");
    }

    /**
     * @return array
     */
    public function postSpeedLimitActivate(): array {
        if($this->postWakeUp()) {
            $result = $this->makeAPIRequest("1493131276665295", "command/speed_limit_activate" , "POST")["response"]["result"];
            $reason = $this->makeAPIRequest("1493131276665295", "command/speed_limit_activate" , "POST")["response"]["reason"];
            return array("result" => $result,"reason" => $reason);
        }
        return array("reason" => "La voiture n'est pas apte à recevoir d'ordre");
    }

    /**
     * @return array
     */
    public function postSpeedLimitDeactivate(): array {
        if($this->postWakeUp()) {
            $result = $this->makeAPIRequest("1493131276665295", "command/speed_limit_deactivate" , "POST")["response"]["result"];
            $reason = $this->makeAPIRequest("1493131276665295", "command/speed_limit_deactivate" , "POST")["response"]["reason"];
            return array("result" => $result,"reason" => $reason);
        }
        return array("reason" => "La voiture n'est pas apte à recevoir d'ordre");
    }

    /**
     * @return array
     */
    public function postSpeedLimitClearPin(): array {
        if($this->postWakeUp()) {
            $result = $this->makeAPIRequest("1493131276665295", "command/speed_limit_clear_pin" , "POST")["response"]["result"];
            $reason = $this->makeAPIRequest("1493131276665295", "command/speed_limit_clear_pin" , "POST")["response"]["reason"];
            return array("result" => $result,"reason" => $reason);
        }
        return array("reason" => "La voiture n'est pas apte à recevoir d'ordre");
    }

    /**
     * @return array
     */
    public function postSpeedLimitSetLimit(): array {
        if($this->postWakeUp()) {
            $result = $this->makeAPIRequest("1493131276665295", "command/speed_limit_set_limit" , "POST")["response"]["result"];
            $reason = $this->makeAPIRequest("1493131276665295", "command/speed_limit_set_limit" , "POST")["response"]["reason"];
            return array("result" => $result,"reason" => $reason);
        }
        return array("reason" => "La voiture n'est pas apte à recevoir d'ordre");
    }

    /**
     * @return array
     */
    public function postStartCharge(): array {
        if($this->postWakeUp()) {
            $result = $this->makeAPIRequest("1493131276665295", "command/start_charge" , "POST")["response"]["result"];
            $reason = $this->makeAPIRequest("1493131276665295", "command/start_charge" , "POST")["response"]["reason"];
            return array("result" => $result,"reason" => $reason);
        }
        return array("reason" => "La voiture n'est pas apte à recevoir d'ordre");
    }

    /**
     * @return array
     */
    public function postStopCharge(): array {
        if($this->postWakeUp()) {
            $result = $this->makeAPIRequest("1493131276665295", "command/start_stop" , "POST")["response"]["result"];
            $reason = $this->makeAPIRequest("1493131276665295", "command/start_stop" , "POST")["response"]["reason"];
            return array("result" => $result,"reason" => $reason);
        }
        return array("reason" => "La voiture n'est pas apte à recevoir d'ordre");
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
        if($this->postWakeUp()) {
            $result = $this->makeAPIRequest("1493131276665295", "command/sun_roof_control?state={$state}&percent={$percent}" , "POST")["response"]["result"];
            $reason = $this->makeAPIRequest("1493131276665295", "command/sun_roof_control?state={$state}&percent={$percent}" , "POST")["response"]["reason"];
            return array("result" => $result,"reason" => $reason);
        }
        return array("reason" => "La voiture n'est pas apte à recevoir d'ordre");
    }

}