export default class InputDetect{

    static ACTION_TESLA = {
        "wake_up":"Helloworld/wake_up",
        "door_unlock":"Openings/postActuateDoorLock",
        "door_lock":"Openings/postActuateDoorLock",
        "honk_horn":"OtherControls/postHonkHorn",
        "flash_lights":"OtherControls/postFlashLights",
        "auto_conditioning_start":"postToggleConditioningState",
        "auto_conditioning_stop":"Climate/postToggleConditioningState",
        "set_temps":"Climate/postSetBothTemps",
        "set_charge_limit":"Charge/postSetChargeLimit",
        "charge_max_range":"Charge/postChargeMaxRange",
        "sun_roof_control":"Openings/postSunRoofControl",
        "actuate_trunk":"Openings/postActuateTrunk",
        "remote_start_drive":"OtherControls/postRemoteStartDrive",
        "charge_port_door_open":"postActuateChargePort",
        "charge_port_door_close":"Charge/postActuateChargePort",
        "charge_start":"postToggleChargeStat",
        "set_valet_mode":"Valet/postSetValetMode",
        "reset_valet_pin":"Valet/postResetValetPin",
        "speed_limit_activate":"postSpeedLimitToggleState",
        "speed_limit_deactivate":"SpeedLimit/postSpeedLimitToggleState",
        "speed_limit_set_limit":"SpeedLimit/postSpeedLimitSetLimit",
        "speed_limit_clear_pin":"SpeedLimit/postSpeedLimitClearPin",
        "service_data":"Service/getServiceData",
        "gui_settings":"Settings/getDriveGUIData",
        "mobile_enabled":"Settings/getIsMobileEnabled",
        "vehicles":"Vehicle/getAllVehicles",
        "id_vehicle":"Vehicle/getVehiculeData",
        "vehicle_data":"Vehicle/getVehicleData",
        "drive_state":"Vehicle/getDriveStateData",
        "charge_state":"Charge/getChargeStateData",
        "stop_charge":"Charge/postToggleChargeStat",
        "climate_state":"Climate/getChargeClimateState"
    };
    constructor(){
    }

    static GetDataFromServer(data) {
        let request = InputDetect.ACTION_TESLA[data];
        let url = "https://localhost/LP/teslaApp/model/HttpRequestHandlerModel.php?url="+request ;
        return fetch(url).then((response) => response.json()).catch((err) => "error");
    }
}
