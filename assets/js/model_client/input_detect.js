export default class InputDetect{

    static ACTION_TESLA = {
        "wake_up":"HelloworldController.php/wake_upAction",
        "door_unlock":"ControllerOpenings.php/postActuateDoorLockAction",
        "door_lock":"ControllerOpenings.php/postActuateDoorLockAction",
        "honk_horn":"ControllerOtherControls.php/postHonkHornAction",
        "flash_lights":"ControllerOtherControls.php/postFlashLightsAction",
        "auto_conditioning_start":"postToggleConditioningStateAction",
        "auto_conditioning_stop":"ControllerClimate.php/postToggleConditioningStateAction",
        "set_temps":"ControllerClimate.php/postSetBothTempsAction",
        "set_charge_limit":"ControllerCharge.php/postSetChargeLimitAction",
        "charge_max_range":"ControllerCharge.php/postChargeMaxRangeAction",
        "sun_roof_control":"ControllerOpenings.php/postSunRoofControlAction",
        "actuate_trunk":"ControllerOpenings.php/postActuateTrunkAction",
        "remote_start_drive":"ControllerOtherControls.php/postRemoteStartDriveAction",
        "charge_port_door_open":"postActuateChargePortAction",
        "charge_port_door_close":"ControllerCharge.php/postActuateChargePortAction",
        "charge_start":"postToggleChargeStatAction",
        "set_valet_mode":"ControllerValet.php/postSetValetModeAction",
        "reset_valet_pin":"ControllerValet.php/postResetValetPinAction",
        "speed_limit_activate":"postSpeedLimitToggleStateAction",
        "speed_limit_deactivate":"ControllerSpeedLimit.php/postSpeedLimitToggleStateAction",
        "speed_limit_set_limit":"ControllerSpeedLimit.php/postSpeedLimitSetLimitAction",
        "speed_limit_clear_pin":"ControllerSpeedLimit.php/postSpeedLimitClearPinAction",
        "service_data":"ControllerService.php/getServiceDataAction",
        "gui_settings":"ControllerSettings.php/getDriveGUIDataAction",
        "mobile_enabled":"ControllerSettings.php/getIsMobileEnabledAction",
        "vehicles":"ControllerVehicle.php/getAllVehiclesAction",
        "id_vehicle":"ControllerVehicle.php/getVehiculeDataAction",
        "vehicle_data":"ControllerVehicle.php/getVehicleDataAction",
        "drive_state":"ControllerVehicle.php/getDriveStateDataAction",
        "charge_state":"ControllerCharge.php/getChargeStateDataAction",
        "stop_charge":"ControllerCharge.php/postToggleChargeStatAction",
        "climate_state":"ControllerClimate.php/getChargeClimateStateAction"
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
