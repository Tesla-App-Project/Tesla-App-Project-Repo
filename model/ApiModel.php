<?php

class ApiModel
{
    private string $token;
    private string $refreshToken;
    private string $idCar = "10";
    private string $baseURLDEV = 'http:/78.123.242.51:25000/api/1/vehicles';
    private string $baseURLPROD = 'https://owner-api.teslamotors.com/api/1/vehicles';

    /**
     * @throws Exception
     */
    public function __construct() {
        $dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
        $dotenv->load();

        //data from the .env
        $config = [
            'tokens' => [
                'devToken' => $_ENV['DEV_TOKEN'] ?? 'TOKEN',
                'prodToken' => $_ENV['PROD_TOKEN'] ?? 'TOKEN',
            ]
        ];

        $user = new UserModel();
        $this->setToken($user->getUserToken($_SESSION["email"], $_SESSION["id"])["token"]);

        $ch = curl_init();

        // Check if initialization had gone wrong*
        if ($ch === false) {
            throw new Exception('failed to initialize');
        }

        curl_setopt($ch, CURLOPT_URL, "https://owner-api.teslamotors.com/api/1/vehicles");

        // Bearer token and data type

        $headers = [
            0 => 'Content-Type: application/json; charset=utf-8',
            1 => "Authorization: Bearer {$this->getToken()}",
        ];

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

        if($_ENV['DEV']){
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        }

        try {
            $result = curl_exec($ch);
        } catch (Exception $e) {
            var_dump($e->getCode() . " " . $e->getMessage());
        } finally {
            curl_close($ch);
            $this->idCar = json_decode($result)->response[0]->id ?? 0;
            if($this->idCar === 0){
                $this->__construct();
            }
        }

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

    public function setRefreshToken(string $refreshToken): void {

        // TODO : DB Request to fetch encrypted token
        // Then decrypt it

        $this->refreshToken = $refreshToken;
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

        $user = new UserModel();
        return $user->getUserToken($_SESSION["email"], $_SESSION["id"])["token"];
    }

    /**
     * @throws Exception
     */
    public function refreshToken(): array
    {

        $ch = curl_init();

        // Check if initialization had gone wrong*
        if ($ch === false) {
            throw new Exception('failed to initialize');
        }

        curl_setopt($ch, CURLOPT_URL, "https://auth.tesla.com/oauth2/v3/token");

        // Bearer token and data type

        $requestBody = [
            "grant_type" => "refresh_token",
            "client_id" => "ownerapi",
            "refresh_token" => $this->refreshToken,
            "scope" => "openid email offline_access"
        ];

        $headers = [
            0 => 'Content-Type: application/json; charset=utf-8',
            1 => "Authorization: Bearer {$this->getToken()}",
        ];

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($requestBody));

        if($_ENV['DEV']){
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        }

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

        $requestIdCar === null ? $urlRequest = "$this->baseURLPROD/" : $urlRequest = "$this->baseURLPROD/$requestIdCar/$requestUrl";

        $ch = curl_init();

        // Check if initialization had gone wrong*    
        if ($ch === false) {
            throw new Exception('failed to initialize');
        }

        $wakeUp = $this->postWakeUp("https://owner-api.teslamotors.com/api/1/vehicles/" . $requestIdCar . '/wake_up');
//        die(var_dump($wakeUp));

        if(($wakeUp["response"]["id"] ?? "") != $requestIdCar) {
            throw new Exception("failed to wake up car");
        }

        curl_setopt($ch, CURLOPT_URL, $urlRequest);

        // Bearer token and data type

        $headers = [
            0 => 'Content-Type: application/json; charset=utf-8',
            1 => "Authorization: Bearer {$this->getToken()}",
        ];

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $requestType);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($requestBody));

        if($_ENV['DEV']){
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        }

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
     * @throws Exception
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
     * Allows you to get a list of the vehicles with their name
     * Returns an array that contains only the name, the count() of this array is the amount of vehicle
     * @return string | array
     * @throws Exception
     */
    public function getVehiclesDatasList(): string | array {

        $result = $this->getAllVehiclesData();
        if($result["count"] === 0) {
            return "No cars found";
        }
        else {
            $carArray = [];
            for($i = 0; $i < $result["count"]; $i++){
                $carArray[$i]["name"] = $result["response"][$i]["display_name"];
                $carArray[$i]["id"] = $result["response"][$i]["vehicle_id"];
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
     * @throws Exception
     */
    public function getAllData(): array {
        return $this->makeAPIRequest($this->idCar, "vehicle_data", "GET", array());
    }

    /**
     * @return array
     * @throws Exception
     */
    public function getAllDataById(string $id): array {
        return $this->makeAPIRequest($id, "vehicle_data", "GET", array());
    }

    /**
     * @return array
     */
    public function getChargeStateData(): array {
        return $this->getAllData()["response"]["charge_state"];
    }

    /**
     * @return array
     */
    public function getClimateData(): array {
        return $this->getAllData()["response"]["climate_state"];
        //return $this->makeAPIRequest($this->idCar, "data_request/climate_state", "GET", array());
    }

    /**
     * @return string
     */
    public function getCarName(): string {
        return $this->makeAPIRequest($this->idCar, "", "GET", array())["response"]["display_name"];
    }

    /**
     * @return int
     */
    public function getTemperatureData(): float {
        return $this->getAllData()["response"]["climate_state"]["inside_temp"];
        //return $this->makeAPIRequest($this->idCar, "data_request/climate_state", "GET", array())["response"]["inside_temp"];
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
     * Allows you to wake up the car
     * @param string $requestUrl
     * @return array
     * @throws Exception
     */
    public function postWakeUp(string $requestUrl): array {

        $ch = curl_init();

        if ($ch === false) {
            throw new Exception('failed to initialize');
        }

        curl_setopt($ch, CURLOPT_URL, $requestUrl);

        $headers = [
            0 => 'Content-Type: application/json; charset=utf-8',
            1 => "Authorization: Bearer {$this->getToken()}"
        ];
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

        if($_ENV['DEV']){
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        }

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

    /**
     * @param array $params
     * @return array
     * @throws Exception
     */
    public function postActuateTrunk(array $params): array {

        $result = $this->makeAPIRequest($this->idCar, "command/actuate_trunk" , "POST", array("which_trunk" => $params[0][2]));
        return array("result" => $result["response"]["result"],"reason" => $result["response"]["reason"]);

    }

    /**
     * @return array
     * @throws Exception
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
     * @throws Exception
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
     * @throws Exception
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
     * @param array $chosenTrunk choose if front or rear
     * @return bool
     */
    public function isTrunkOpen(array $chosenTrunk): bool {
        $result = $this->getAllData();
        $convert = ["front" => "ft", "rear" => "rt"];
        return !!$result["response"]["vehicle_state"][$convert[$chosenTrunk[0]["whichTrunk"]]];
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
            "level" => $result["battery_level"],
            "usable_level" => $result["usable_battery_level"]
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

    /**
     * @return bool false if flashlights off and true if flashlights on
     */
    public function isFlashLightsON(): bool {
        $result = $this->getAllData();
        return $result["response"]["command"]["flash_lights"];
    }

}