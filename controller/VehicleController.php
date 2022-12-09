<?php

class VehicleController
{
    private HttpRequestHandlerModel $_httpRequestHandler;

    public function __construct()
    {
        $this->_httpRequestHandler = new HttpRequestHandlerModel();
    }

    /**
     * @API_route /api/1/vehicles
     * @return void
     * @throws Exception
     */
    public function getAllVehiclesAction() : void {
        echo $this->_httpRequestHandler->callAPI('getAllVehicles', true);
    }

    //TODO : This method name could be renamed

    /**
     * @API_route /api/1/vehicles/id_vehicle
     * @return void
     * @throws Exception
     */
    public function getVehiculeDataAction() : void {
        echo $this->_httpRequestHandler->callAPI('getVehiculeData', true);
    }

    /**
     * @API_route /api/1/vehicles/id_vehicle/vehicle_data
     * @return void
     * @throws Exception
     */
    public function getVehicleDataAction() : void {
        echo $this->_httpRequestHandler->callAPI('getVehicleData', true);
    }

    /**
     * @API_route /api/1/vehicles/id_vehicle/data_request/drive_state
     * @return void
     * @throws Exception
     */
    public function getDriveStateDataAction() : void {
        echo $this->_httpRequestHandler->callAPI('getDriveStateData', true);
    }
}