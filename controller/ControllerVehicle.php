<?php

use JetBrains\PhpStorm\Pure;

class ControllerVehicle extends ControllerAPI
{
    /**
     * @API_route /api/1/vehicles
     * @return void
     */
    public function getAllVehiclesAction() : void {
        echo $this->_httpRequestHandler->callAPI('getAllVehicles');
    }

    //TODO : This method name could be renamed
    /**
     * @API_route /api/1/vehicles/id_vehicle
     * @return void
     */
    public function getVehiculeDataAction() : void {
        echo $this->_httpRequestHandler->callAPI('getVehiculeData');
    }

    /**
     * @API_route /api/1/vehicles/id_vehicle/vehicle_data
     * @return void
     */
    public function getVehicleDataAction() : void {
    }

    /**
     * @API_route /api/1/vehicles/id_vehicle/data_request/drive_state
     * @return void
     */
    public function getDriveStateDataAction() : void {
        echo $this->_httpRequestHandler->callAPI('getDriveStateData');
    }
}