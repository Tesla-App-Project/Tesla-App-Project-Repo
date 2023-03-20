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
        $start = explode(',',  $this->getStartTime());
        $stop = explode(',', $this->getStopTime());
        $old_crontab = exec('crontab -l');
        $start_cron = $start[0] . ' ' . $start[1] . ' * * * php ~/Documents/IUT/LP/cron_test/crontask.php';
        $stop_cron = $stop[0] . ' ' . $stop[1] . ' * * * php ~/Documents/IUT/LP/cron_test/crontask.php';
        if (!file_exists('~/Documents/IUT/LP/cron_test/tmp_cron')) exec('touch ~/Documents/IUT/LP/cron_test/tmp_cron');
        exec('echo ' . $old_crontab . '\n'. $start_cron . '\n' . $stop_cron . ' >> ~/Documents/IUT/LP/cron_test/tmp_cron');
        exec('crontab ~/Documents/IUT/LP/cron_test/tmp_cron');
    }

    public function togglePlanification(): void
    {
        // TODO: Implement togglePlanification() method.
    }
}