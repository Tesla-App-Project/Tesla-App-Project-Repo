<?php

class ClimateModel extends AbstractPlanificationModel
{

    public function writeDbPlanification(): void
    {
        $db = new Database();
        //CREATE climate_plannification
        $climate = $db->queryCreateAction(
            [
                //colum name / DATA
                'id_climate_plannification' => $this->getId(),
                'start_climate_time' => $this->getStartTime(),
                'stop_climate_time' => $this->getStopTime(),
                'climate_active' => $this->getActive(),
                'climate_active' => $this->getIdCar()
            ],
            'climate_plannification'
        );
    }

    public function writeCronPlanification(): void
    {

    }

    public function togglePlanification(): void
    {
        // TODO: Implement togglePlanification() method.
    }
}