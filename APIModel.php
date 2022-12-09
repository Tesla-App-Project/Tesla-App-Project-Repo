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
     * @return void
     */

    private function makeAPIRequest(string | null $idCar, string $url, string $requestType): void {

        // Token assignment
        $this->setToken();

        // TODO : alexlebg has to be replaced by the actual car's id
        // One person can own multiple cars

        $idCar === null ? $urlRequest = "{$this->baseURL}/" : $urlRequest = "{$this->baseURL}/{$idCar}/{$url}";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $urlRequest);

        // Bearer token and data type

        $headers = [];
        $headers[] = 'Content-Type:application/JSON_string';
        $headers[] = "Authorization: Bearer " . $this->token;

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $requestType);

        try {
            $result = curl_exec($ch);
        } catch (Exception $e) {
            var_dump($e->getCode() . " " . $e->getMessage());
        } finally {
            curl_close($ch);
            json_decode($result) ?? "Error in executing the request";
        }
    }


    // <------------------- GET methods ------------------->

    /**
     * @return void
     */
    public function getAllVehicles(): void {
        $this->makeAPIRequest(null, "", "GET");
    }

    /**
     * @return void
     */
    public function getVehiculeData(): void {
        $this->makeAPIRequest("alexlebg", "", "GET");
    }

    /**
     * @return void
     */
    public function getAllData(): void {
        $this->makeAPIRequest("alexlebg", "data", "GET");
    }

    /**
     * @return void
     */
    public function getChargeStateData(): void {
        $this->makeAPIRequest("alexlebg", "data_request/charge_state", "GET");
    }

    /**
     * @return void
     */
    public function getChargeClimateData(): void {
        $this->makeAPIRequest("alexlebg", "data_request/climate_state", "GET");
    }

    /**
     * @return void
     */
    public function getDriveStateData(): void {
        $this->makeAPIRequest("alexlebg", "data_request/drive_state", "GET");
    }

    /**
     * @return void
     */
    public function getDriveGuiData(): void {
        $this->makeAPIRequest("alexlebg", "data_request/gui_settings", "GET");
    }

    /**
     * @return void
     */
    public function getIsMobileEnabled(): void {
        $this->makeAPIRequest("alexlebg", "mobile_enabled", "GET");
    }

    /**
     * @return void
     */
    public function getServiceData(): void {
        $this->makeAPIRequest("alexlebg", "service_data", "GET");
    }

    /**
     * @return void
     */
    public function getVehicleData(): void {
        $this->makeAPIRequest("alexlebg", "vehicle_data", "GET");
    }
    
    // <------------------- POST methods ------------------->

    /**
     * @return void
     */
    public function postStartCar(): void {
        $this->makeAPIRequest("alexlebg", "wake_up" , "POST");
    }

    /**
     * @return void
     */
    public function postActuateTrunk(): void {
        $this->makeAPIRequest("alexlebg", "command/actuate_trunk" , "POST");
    }

    /**
     * @return void
     */
    public function postConditioningStart(): void {
        $this->makeAPIRequest("alexlebg", "command/auto_conditioning_start" , "POST");
    }

    /**
     * @return void
     */
    public function postConditioningStop(): void {
        $this->makeAPIRequest("alexlebg", "command/auto_conditioning_stop" , "POST");
    }

    /**
     * @return void
     */
    public function postChargeMaxRange(): void {
        $this->makeAPIRequest("alexlebg", "command/charge_max_range" , "POST");
    }

    /**
     * @return void
     */
    public function postChargePortClose(): void {
        $this->makeAPIRequest("alexlebg", "command/charge_port_door_close" , "POST");
    }

    /**
     * @return void
     */
    public function postChargePortOpen(): void {
        $this->makeAPIRequest("alexlebg", "command/charge_port_door_open" , "POST");
    }

    /**
     * @return void
     */
    public function postDoorLock(): void {
        $this->makeAPIRequest("alexlebg", "command/door_lock" , "POST");
    }

    /**
     * @return void
     */
    public function postDoorUnlock(): void {
        $this->makeAPIRequest("alexlebg", "command/door_unlock" , "POST");
    }

    /**
     * @return void
     */
    public function postFlashLights(): void {
        $this->makeAPIRequest("alexlebg", "command/flash_lights" , "POST");
    }

    /**
     * @return void
     */
    public function postHonkHorn(): void {
        $this->makeAPIRequest("alexlebg", "command/honk_horn" , "POST");
    }

    /**
     * @return void
     */
    public function postRemoteStartDrive(): void {
        $this->makeAPIRequest("alexlebg", "command/remote_start_drive" , "POST");
    }

    /**
     * @return void
     */
    public function postResetValetPin(): void {
        $this->makeAPIRequest("alexlebg", "command/reset_valet_pin" , "POST");
    }

    /**
     * @param bool $mode whether to set the mode on or off
     * @param string $password the user password
     * @return void
     */
    public function postSetValetMode(bool $mode, string $password): void {
        $this->makeAPIRequest("alexlebg", "command/set_valet_mode?on=" . $mode .  "&password=" . $password, "POST");
    }

    /**
     * @param int $percent charge limit percentage
     * @return void
     */
    public function postSetChargeLimit(int $percent): void {
        $this->makeAPIRequest("alexlebg", "command/set_charge_limit?percent=" . $percent , "POST");
    }

    /**
     * @param int | null $driverTemp driver HVAC temp
     * @param int | null $passengerTemp passenger HVAC temp
     * @return void
     * @todo Verify if API takes null as parameter
     */
    public function postSetBothTemps(int | null $driverTemp, int | null $passengerTemp): void {
        $this->makeAPIRequest("alexlebg", "command/set_temps?driver_temp=" . $driverTemp .  "&passenger_temp=" . $passengerTemp, "POST");
    }

    /**
     * @return void
     */
    public function postSpeedLimitActivate(): void {
        $this->makeAPIRequest("alexlebg", "command/speed_limit_activate" , "POST");
    }

    /**
     * @return void
     */
    public function postSpeedLimitDeactivate(): void {
        $this->makeAPIRequest("alexlebg", "command/speed_limit_deactivate" , "POST");
    }

    /**
     * @return void
     */
    public function postSpeedLimitClearPin(): void {
        $this->makeAPIRequest("alexlebg", "command/speed_limit_clear_pin" , "POST");
    }

    /**
     * @return void
     */
    public function postSpeedLimitSetLimit(): void {
        $this->makeAPIRequest("alexlebg", "command/speed_limit_set_limit" , "POST");
    }

    /**
     * @return void
     */
    public function postStartCharge(): void {
        $this->makeAPIRequest("alexlebg", "command/start_charge" , "POST");
    }

    /**
     * @return void
     */
    public function postStopCharge(): void {
        $this->makeAPIRequest("alexlebg", "command/start_stop" , "POST");
    }

    /**
     * To use it, either pass one of the specified strings, or pass the corresponding number, or use move with a custom percentage.
     * eg : open => 100%, closed => 0%, comfort => 80%, vent => 15% and indicate move for a custom percent.
     * If you are using a different state than move, you don't need to pass a percent as parameter - pass null
     * @param string $state
     * @param int | null $percent
     * @return void
     * @todo Verify if API takes null as parameter
     */
    public function postSunRoofControl(string $state, int | null $percent): void {
        $this->makeAPIRequest("alexlebg", "command/sun_roof_control?state={$state}&percent={$percent}" , "POST");
    }

}