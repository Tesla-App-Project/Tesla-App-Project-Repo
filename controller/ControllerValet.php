<?php

use JetBrains\PhpStorm\Pure;

class ControllerValet extends ControllerAPI
{
    /**
     * @API_route /api/1/vehicles/id_vehicle/command/reset_valet_pin
     * @return void
     */
    public function postResetValetPinAction() : void {
        echo $this->_httpRequestHandler->callAPI('postResetValetPin', false);
    }

    /**
     * @API_route /api/1/vehicles/id_vehicle/command/set_valet_mode
     * @return void
     */
    public function postSetValetModeAction() : void {
        echo $this->_httpRequestHandler->callAPI('postSetValetMode', false);
    }
}