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

    }
}