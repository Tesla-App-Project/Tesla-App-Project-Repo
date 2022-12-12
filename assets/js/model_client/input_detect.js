class InputDetect{
    static ACTION_TESLA = {
        "wake_up":"wake_upAction",
        "door_unlock":"",
        "door_lock":"postActuateDoorLockAction",
        "honk_horn":"postHonkHornAction",
        "flash_lights":"postFlashLightsAction",
        "auto_conditioning_start":"postToggleConditioningStateAction",
        "auto_conditioning_stop":"",
        "set_temps":"postSetBothTempsAction",
        "set_charge_limit":"postSetChargeLimitAction",
        "charge_max_range":"postChargeMaxRangeAction",
        "charge_standard":"",
        "sun_roof_control":"postSunRoofControlAction",
        "actuate_trunk":"postActuateTrunkAction",
        "remote_start_drive":"postRemoteStartDriveAction",
        "charge_port_door_open":"postActuateChargePortAction",
        "charge_port_door_close":"",
        "charge_start":"postToggleChargeStatAction",
        "charge_stop":"",
        "upcoming_calendar_entries":"",
        "set_valet_mode":"postSetValetModeAction",
        "reset_valet_pin":"postResetValetPinAction",
        "speed_limit_activate":"postSpeedLimitToggleStateAction",
        "speed_limit_deactivate":"",
        "speed_limit_set_limit":"postSpeedLimitSetLimitAction",
        "speed_limit_clear_pin":"postSpeedLimitClearPinAction",
        "backup":"",
        "site_name":"",
        "operation":"",
        "time_of_use_settings":"",
        "storm_mode":"",
        "service_data":"getServiceDataAction",
        "gui_settings":"getDriveGUIDataAction",
        "mobile_enabled":"getIsMobileEnabledAction",
        "vehicles":"getAllVehiclesAction",
        "id_vehicle":"getVehiculeDataAction",
        "vehicle_data":"getVehicleDataAction",
        "drive_state":"getDriveStateDataAction"
    };
    constructor(){
        
        this.GetDataFromComponant();
        
    }

    GetDataFromComponant(){

        // Récupère tous les composants boutons et liens sous forme de tableau
        let boutons = document.querySelectorAll("button, a");

        // Parcourt le tableau de composants
        boutons.forEach(bouton => {

            let testdata = Object.keys(bouton.dataset).length==0;
            // si data pas vide
            if(!testdata){
                bouton.addEventListener('click', () => {
                    let data = bouton.dataset.action;
                    let test = InputDetect.ACTION_TESLA[data];
                    console.log(InputDetect.ACTION_TESLA[data]);
                    data = this.GetDataFromServer(api_function);
                    this.TreatData();

                });
            }
        });
    }
    GetDataFromServer(api_function) {
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
    }
    TreatData(){
        
    }
}
new InputDetect();