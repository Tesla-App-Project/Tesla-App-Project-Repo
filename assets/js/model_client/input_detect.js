export default class InputDetect{

    static ACTION_TESLA = {
        "wake_up":"HelloworldController.php/wake_up",
        "door_unlock":"ControllerOpenings.php/postActuateDoorLock",
        "door_lock":"ControllerOpenings.php/postActuateDoorLock",
        "honk_horn":"ControllerOtherControls.php/postHonkHorn",
        "flash_lights":"ControllerOtherControls.php/postFlashLights",
        "auto_conditioning_start":"postToggleConditioningState",
        "auto_conditioning_stop":"ControllerClimate.php/postToggleConditioningState",
        "set_temps":"ControllerClimate.php/postSetBothTemps",
        "set_charge_limit":"ControllerCharge.php/postSetChargeLimit",
        "charge_max_range":"ControllerCharge.php/postChargeMaxRange",
        "sun_roof_control":"ControllerOpenings.php/postSunRoofControl",
        "actuate_trunk":"ControllerOpenings.php/postActuateTrunk",
        "remote_start_drive":"ControllerOtherControls.php/postRemoteStartDrive",
        "charge_port_door_open":"postActuateChargePort",
        "charge_port_door_close":"ControllerCharge.php/postActuateChargePort",
        "charge_start":"postToggleChargeStat",
        "set_valet_mode":"ControllerValet.php/postSetValetMode",
        "reset_valet_pin":"ControllerValet.php/postResetValetPin",
        "speed_limit_activate":"postSpeedLimitToggleState",
        "speed_limit_deactivate":"ControllerSpeedLimit.php/postSpeedLimitToggleState",
        "speed_limit_set_limit":"ControllerSpeedLimit.php/postSpeedLimitSetLimit",
        "speed_limit_clear_pin":"ControllerSpeedLimit.php/postSpeedLimitClearPin",
        "service_data":"ControllerService.php/getServiceData",
        "gui_settings":"ControllerSettings.php/getDriveGUIData",
        "mobile_enabled":"ControllerSettings.php/getIsMobileEnabled",
        "vehicles":"ControllerVehicle.php/getAllVehicles",
        "id_vehicle":"ControllerVehicle.php/getVehiculeData",
        "vehicle_data":"ControllerVehicle.php/getVehicleData",
        "drive_state":"ControllerVehicle.php/getDriveStateData",
        "charge_state":"ControllerCharge.php/getChargeStateData",
        "stop_charge":"ControllerCharge.php/postToggleChargeStat",
        "climate_state":"ControllerClimate.php/getChargeClimateState"
    };
    constructor(){
    }

    static GetDataFromServer(api_function) {
        /*
        fetch("http://urlversmonserveur",
		{
		    headers: {
		      'Accept': 'application/json',
		      'Content-Type': 'application/json'
		    },
		    method: "POST",
		    body: JSON.stringify({param1: 'valeur'})
        })
        .then(function(response) {
            //S'il s'agit de JSON nous pouvons l'exploiter à l'aide de json()
            return response.json().then(function(O_json) {  
                //traitement de notre objet en provenance du Json
            });	
        })
        .catch(function() {

        });
        */
        return null;
    }
}
new InputDetect();
