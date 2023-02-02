<?php

class ChargeModel extends AbstractPlanificationModel
{
    public function writeDbPlanification(): void
    {
        $db = new Database();
        //CREATE charge_plannification
        $charge = $db->queryCreateAction(
            [
                //colum name / DATA
                'id_charge_plannification' => $this->getId(),
                'start_charge_time' => $this->getStartTime(),
                'stop_charge_time' => $this->getStopTime(),
                'charge_active' => $this->getActive(),
                'id_car' => $this->getIdCar(),
            ],
            'charge_plannification'
        );
    }

    public function writeCronPlanification(): void
    {
        // TODO: Implement writeCronPlanification() method.
    }

    public function togglePlanification(): void
    {
        // TODO: Implement togglePlanification() method.
    }
}