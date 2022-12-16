<?php

class ApiModel
{
    private $token;
    private string $idCar = "1493131276665295";
    private string $baseURLDEV = 'http:/78.123.242.51:25000/api/1/vehicles';
    private string $baseURLPROD = 'https://owner-api.teslamotors.com/api/1/vehicles';

    public function __construct() {
        $dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
        $dotenv->load();

        //data from the .env
        $config = [
            'tokens' => [
                'devToken' => $_ENV['DEV_TOKEN'],
                'prodToken' => $_ENV['PROD_TOKEN'],
            ]
        ];

        //$this->setToken($config["tokens"]["prodToken"]);
        $this->setToken($config["tokens"]["devToken"]);
    }

    /**
     * Allows you to set a token
     * @param string $tokenTesla
     * @return void
     */
    public function setToken(string $tokenTesla): void {

        // TODO : DB Request to fetch encrypted token
        // Then decrypt it

        $this->token = $tokenTesla;
    }

    /**
     * Allows you to set the car id
     * @param string $idCar
     * @return void
     */
    public function setIdCar(string $idCar): void {

        // TODO : Make user selec car on login then use it

        $this->idCar = $idCar;
    }

    /**
     * return Token
     * @return string
     */
    public function getToken(): string {

        // TODO : DB Request to fetch encrypted token
        // Then decrypt it

        return $this->token;
    }

    /**
     * Allows you to revoke the current token
     * @return array
     */
//    public function revokeToken(string $tokenToRemoved): array {
//        $ch = curl_init();
//
//        // Check if initialization had gone wrong*
//        if ($ch === false) {
//            throw new Exception('failed to initialize');
//        }
//
//        curl_setopt($ch, CURLOPT_URL, "https://owner-api.teslamotors.com/oauth/revoke");
//
//        $headers = [];
//        $headers[] = 'Content-Type: application/json; charset=utf-8';
//
//        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
//        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
//        curl_setopt($ch, CURLOPT_POSTFIELDS, '{"token": ' . $tokenToRemoved . '}');
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
//
//        try {
//            $result = curl_exec($ch);
//        } catch (Exception $e) {
//            var_dump($e->getCode() . " " . $e->getMessage());
//        } finally {
//            curl_close($ch);
//            return json_decode($result, true);
//        }
//    }

    /**
     * @param string | null $requestIdCar id of the car you wish to interact with
     * @param string $requestUrl api endpoint url
     * @param string $requestType request type : GET or POST
     * @param array $requestBody the body of the request, JSON formatted
     * @return array
     * @throws Exception
     */

    private function makeAPIRequest(string | null $requestIdCar, string $requestUrl, string $requestType, array $requestBody): array {

        // Token assignment
        //$this->postWakeUp();

        // TODO : 1493131276665295 has to be replaced by the actual car's id
        // One person can own multiple cars

        $requestIdCar === null ? $urlRequest = "{$this->baseURLDEV}/" : $urlRequest = "{$this->baseURLDEV}/{$requestIdCar}/{$requestUrl}";

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
        curl_setopt($ch, CURLOPT_POSTFIELDS, $requestBody);

        try {
            $result = curl_exec($ch);
        } catch (Exception $e) {
            var_dump($e->getCode() . " " . $e->getMessage());
        } finally {
            curl_close($ch);
            if(json_decode($result, true) === null) return [];
            return json_decode($result, true);
        }
    }


    // <------------------- GET methods ------------------->

    /**
     * Allows you to get a list of all vehicles with the data
     * @return array
     */
    public function getAllVehiclesData(): array {
        return $this->makeAPIRequest(null, "", "GET", array());
    }

    /**
     * Allows you to get a list of the vehicles with their id
     * Returns an array that contains only the vehicle_id, the count() of this array is the amount of vehicle
     * @return string | array
     * @throws Exception
     */
    public function getVehiclesList(): string | array {

        $result = $this->getAllVehiclesData();
        if($result["count"] === 0) {
            return "No cars found";
        }
        else {
            $carArray = [];
            for($i = 0; $i < $result["count"]; $i++){
                $carArray[$i] = $result["response"][$i]["vehicle_id"];
            }
            return $carArray;
        }
    }

    /**
     * @return array
     */
    public function getVehicleData(): array {
        return $this->makeAPIRequest($this->idCar, "", "GET", array());
    }

    /**
     * @return array
     */
    public function getAllData(): array {
        return $this->makeAPIRequest($this->idCar, "vehicle_data", "GET", array());
    }

    /**
     * @return array
     */
    public function getAllDataLegacy(): array {
        return $this->makeAPIRequest($this->idCar, "data", "GET", array());
    }

    /**
     * @return array
     */
    public function getChargeStateData(): array {
        return $this->makeAPIRequest($this->idCar, "data_request/charge_state", "GET", array());
    }

    /**
     * @return array
     */
    public function getClimateData(): array {
        return $this->makeAPIRequest($this->idCar, "data_request/climate_state", "GET", array());
    }

    /**
     * @return array
     */
    public function getDriveStateData(): array {
        return $this->makeAPIRequest($this->idCar, "data_request/drive_state", "GET", array());
    }

    /**
     * @return array
     */
    public function getDriveGuiData(): array {
        return $this->makeAPIRequest($this->idCar, "data_request/gui_settings", "GET", array());
    }

    /**
     * @return array
     */
    public function getIsMobileEnabled(): array {
        return $this->makeAPIRequest($this->idCar, "mobile_enabled", "GET", array());
    }

    /**
     * @return array
     */
    public function getServiceData(): array {
        return $this->makeAPIRequest($this->idCar, "service_data", "GET", array());
    }



    // <------------------- POST methods ------------------->

    /**
     * @return array
     * @throws Exception
     */
    public function postWakeUp(): array {

        return $this->makeAPIRequest($this->idCar, "wake_up" , "POST", array());

    }

    /**
     * @return array
     * @param string $chosenTrunk choose if front or rear
     */
    public function postActuateTrunk(string $chosenTrunk): array {

        $result = $this->makeAPIRequest($this->idCar, "command/actuate_trunk?which_trunk={$chosenTrunk}" , "POST", array("which_trunk" => $chosenTrunk));
        return array("result" => $result["response"]["result"],"reason" => $result["response"]["reason"]);

    }

    /**
     * @return array
     */
    public function postConditioningStart(): array {

        $result = $this->makeAPIRequest($this->idCar, "command/auto_conditioning_start" , "POST", array());
        return array("result" => $result["response"]["result"],"reason" => $result["response"]["reason"]);

    }

    /**
     * @return array
     */
    public function postConditioningStop(): array {

        $result = $this->makeAPIRequest($this->idCar, "command/auto_conditioning_stop" , "POST", array());
        return array("result" => $result["response"]["result"],"reason" => $result["response"]["reason"]);

    }

    /**
     * @return array
     */
    public function postChargeMaxRange(): array {

        $result = $this->makeAPIRequest($this->idCar, "command/charge_max_range" , "POST", array());
        return array("result" => $result["response"]["result"],"reason" => $result["response"]["reason"]);

    }

    /**
     * @return array
     */
    public function postChargePortClose(): array {

        $result = $this->makeAPIRequest($this->idCar, "command/charge_port_door_close" , "POST", array());
        return array("result" => $result["response"]["result"],"reason" => $result["response"]["reason"]);

    }

    /**
     * @return array
     */
    public function postChargePortOpen(): array {

        $result = $this->makeAPIRequest($this->idCar, "command/charge_port_door_open" , "POST", array());
        return array("result" => $result["response"]["result"],"reason" => $result["response"]["reason"]);
    }

    /**
     * @return array
     */
    public function postDoorLock(): array {

        $result = $this->makeAPIRequest($this->idCar, "command/door_lock" , "POST", array());
        return array("result" => $result["response"]["result"],"reason" => $result["response"]["reason"]);
    }

    /**
     * @return array
     */
    public function postDoorUnlock(): array {

        $result = $this->makeAPIRequest($this->idCar, "command/door_unlock" , "POST", array());
        return array("result" => $result["response"]["result"],"reason" => $result["response"]["reason"]);

    }

    /**
     * @return array
     */
    public function postFlashLights(): array {

        $result = $this->makeAPIRequest($this->idCar, "command/flash_lights" , "POST", array());
        return array("result" => $result["response"]["result"],"reason" => $result["response"]["reason"]);

    }

    /**
     * @return array
     */
    public function postHonkHorn(): array {

        $result = $this->makeAPIRequest($this->idCar, "command/honk_horn" , "POST", array());
        return array("result" => $result["response"]["result"],"reason" => $result["response"]["reason"]);

    }

    /**
     * @return array
     */
    public function postRemoteStartDrive(): array {

        $result = $this->makeAPIRequest($this->idCar, "command/remote_start_drive" , "POST", array());
        return array("result" => $result["response"]["result"],"reason" => $result["response"]["reason"]);

    }

    /**
     * @return array
     */
    public function postResetValetPin(): array {

        $result = $this->makeAPIRequest($this->idCar, "command/reset_valet_pin" , "POST", array());
        return array("result" => $result["response"]["result"],"reason" => $result["response"]["reason"]);

    }

    /**
     * @param bool $mode whether to set the mode on or off
     * @param string $password the user password
     * @return array
     */
    public function postSetValetMode(bool $mode, string $password): array {

        $result = $this->makeAPIRequest($this->idCar, "command/set_valet_mode?on={$mode}&password={$password}", "POST", array());
        return array("result" => $result["response"]["result"],"reason" => $result["response"]["reason"]);

    }

    /**
     * @param int $percent charge limit percentage
     * @return array
     */
    public function postSetChargeLimit(int $percent): array {

        $result = $this->makeAPIRequest($this->idCar, "command/set_charge_limit?percent={$percent}" , "POST", array());
        return array("result" => $result["response"]["result"],"reason" => $result["response"]["reason"]);

    }

    /**
     * @param int | null $driverTemp driver HVAC temp
     * @param int | null $passengerTemp passenger HVAC temp
     * @return array
     * @todo Verify if API takes null as parameter
     */
    public function postSetBothTemps(int | null $driverTemp, int | null $passengerTemp): array {

        $result = $this->makeAPIRequest($this->idCar, "command/set_temps?driver_temp={$driverTemp}&passenger_temp={$passengerTemp}", "POST", array());
        return array("result" => $result["response"]["result"],"reason" => $result["response"]["reason"]);

    }

    /**
     * @return array
     */
    public function postSpeedLimitActivate(): array {

        $result = $this->makeAPIRequest($this->idCar, "command/speed_limit_activate" , "POST", array());
        return array("result" => $result["response"]["result"],"reason" => $result["response"]["reason"]);

    }

    /**
     * @return array
     */
    public function postSpeedLimitDeactivate(): array {

        $result = $this->makeAPIRequest($this->idCar, "command/speed_limit_deactivate" , "POST", array());
        return array("result" => $result["response"]["result"],"reason" => $result["response"]["reason"]);

    }

    /**
     * @return array
     */
    public function postSpeedLimitClearPin(): array {

        $result = $this->makeAPIRequest($this->idCar, "command/speed_limit_clear_pin" , "POST", array());
        return array("result" => $result["response"]["result"],"reason" => $result["response"]["reason"]);

    }

    /**
     * @return array
     */
    public function postSpeedLimitSetLimit(): array {

        $result = $this->makeAPIRequest($this->idCar, "command/speed_limit_set_limit" , "POST", array());
        return array("result" => $result["response"]["result"],"reason" => $result["response"]["reason"]);

    }

    /**
     * @return array
     */
    public function postStartCharge(): array {

        $result = $this->makeAPIRequest($this->idCar, "command/start_charge" , "POST", array());
        return array("result" => $result["response"]["result"],"reason" => $result["response"]["reason"]);

    }

    /**
     * @return array
     */
    public function postStopCharge(): array {

        $result = $this->makeAPIRequest($this->idCar, "command/start_stop" , "POST", array());
        return array("result" => $result["response"]["result"],"reason" => $result["response"]["reason"]);

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

        $result = $this->makeAPIRequest($this->idCar, "command/sun_roof_control?state={$state}&percent={$percent}" , "POST", array());
        return array("result" => $result["response"]["result"],"reason" => $result["response"]["reason"]);

    }

    /**
     * @param bool $state true to turn it on, false to turn it off
     * @return array
     */
    public function postSentrylMode(bool $state): array {

        $result = $this->makeAPIRequest($this->idCar, "command/set_sentry_mode", "POST", array("on" => $state));
        return array("result" => $result["response"]["result"],"reason" => $result["response"]["reason"]);

    }

    // <------------------- GET STATE methods ------------------->


    /**
     * @param string $chosenTrunk choose if front or rear
     * @return bool
     */
    public function isTrunkOpen(string $chosenTrunk): bool {
        $result = $this->getAllData();
        $convert = ["front" => "ft", "rear" => "rt"];
        return !!$result["response"]["vehicle_state"][$convert[$chosenTrunk]];
    }


    /**
     * Allows you to know if a specific vehicle is online
     * @return bool
     * @throws Exception
     */
    public function isVehicleOnline(): bool {
        $result = $this->getVehicleData();
        if ($result["response"]["state"] === "online") {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Allows you to know if a specific vehicle is online
     * @return bool
     * @throws Exception
     */
    public function isVehicleLocked(): bool {
        $result = $this->getAllData();
        return $result["response"]["vehicle_state"]["locked"];
    }

    /**
     * Allows you to know the HVAC current state
     * @return int
     */
    public function HVACState(): int {
        $result = $this->getClimateData();
        return $result["response"]["fan_status"];
    }

    /**
     * Allows you to know if the HVAC is on or off
     * @return bool
     */
    public function isHVACOn(): bool {
        $result = $this->getClimateData();
        return !!$result["response"]["fan_status"];
    }

    /**
     * @return array returns the inside and outside temps
     */
    public function tempInfos (): array {
        $result = $this->getClimateData();
        return array(
            "inside_temp" => $result["response"]["inside_temp"],
            "outside_temp" =>  $result["response"]["outside_temp"]
        );
    }

    /**
     * @return array that contains latitude, longitude, heading and timestamp, timestamp has to be converted to date, and date is already converted
     */
    public function carPosition(): array {
        $result = $this->getAllData();
        return array(
            "latitude" => $result["response"]["drive_state"]["latitude"],
            "longitude" => $result["response"]["drive_state"]["longitude"],
            "heading" => $result["response"]["drive_state"]["heading"],
            "timestamp" => $result["response"]["drive_state"]["gps_as_of"],
            "date" => getdate($result["response"]["drive_state"]["gps_as_of"])
        );
    }

    /**
     * @return array that contains % of charge level and % of usable charge
     */
    public function batteryLevelData(): array {
        $result = $this->getChargeStateData();
        return array (
            "level" => $result["response"]["battery_level"],
            "usable_level" => $result["response"]["usable_battery_level"]
        );
    }

    /**
     * @return string the current charge state of the car
     */
    public function batteryState(): string {
        $result = $this->getChargeStateData();
        return $result["response"]["charging_state"];
    }

    /**
     * @return bool false if the car is disconnected or at 100%, and true if its  charging
     */
    public function isCharging(): bool {
        $result = $this->getChargeStateData();
        $convert = array(
            "Disconnected" => false,
            "Complete" => false,
            "Stopped" => false,
            "Charging" => true
        );

        return $convert[$result["response"]["charging_state"]];
    }

    /**
     * @return float
     */
    public function batteryRange(): float {
        $result = $this->getChargeStateData();
        return $result["response"]["battery_range"];
    }
    /**
     * @param bool $convert pass true to convert to km/h, false to keep mp/h
     * @return float the current speed limit of the car
     */
    public function speedLimiterCurrentLimit(bool $convert): float {
        $result = $this->getAllData();
        if($convert) return $result["response"]["vehicle_state"]["speed_limit_mode"]["current_limit_mph"] *1.609;
        return $result["response"]["vehicle_state"]["speed_limit_mode"]["current_limit_mph"];
    }

    /**
     * @return bool false if the speed limiter is turned off, true otherwise
     */
    public function speedLimitOn(): bool {
        $result = $this->getAllData();
        return $result["response"]["vehicle_state"]["speed_limit_mode"]["active"];
    }

    public function getSpeedLimiterData(): array {
        $result = $this->getAllData();
        return array(
            "max_limit_mph" => $result["response"]["vehicle_state"]["speed_limit_mode"]["max_limit_mph"],
            "min_limit_mph" => $result["response"]["vehicle_state"]["speed_limit_mode"]["min_limit_mph"]
        );
    }

//    /**
//     * @return bool false if flashlights off and true if flashlights on
//     */
//    public function isFlashLightsON(): bool {
//        $result = $this->getAllData();
//        return $result["response"]["vehicle_state"]["flash_lights"];
//    }

    public function positionState(): array {
        $result = $this->getDriveStateData();
        return array(
            "heading"          => $result["response"]["heading"],
            "latitude"         => $result["response"]["latitude"],
            "longitude"        => $result["response"]["longitude"],
            "native_latitude"  => $result["response"]["native_latitude"],
            "native_longitude" => $result["response"]["native_longitude"],
            "native_type"      => $result["response"]["native_type"]
        );
    }
}