<?php

abstract class AbstractPlanificationModel
{
    private  $id;
    private  $start_time;
    private  $stop_time;
    private  $active;
    private $id_car;

    /**
     * @param $start_time
     * @param $stop_time
     * @param $active
     * @param $id_car
     */
    public function __construct($start_time, $stop_time, $active, $id_car)
    {
        $this->start_time = $start_time;
        $this->stop_time = $stop_time;
        $this->active = $active;
        $this->id_car = $id_car;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getStartTime()
    {
        return $this->start_time;
    }

    /**
     * @param mixed $start_time
     */
    public function setStartTime($start_time): void
    {
        $this->start_time = $start_time;
    }

    /**
     * @return mixed
     */
    public function getStopTime()
    {
        return $this->stop_time;
    }

    /**
     * @param mixed $stop_time
     */
    public function setStopTime($stop_time): void
    {
        $this->stop_time = $stop_time;
    }

    /**
     * @return mixed
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param mixed $active
     */
    public function setActive($active): void
    {
        $this->active = $active;
    }

    /**
     * @return mixed
     */
    public function getIdCar()
    {
        return $this->id_car;
    }

    /**
     * @param mixed $id_car
     */
    public function setIdCar($id_car): void
    {
        $this->id_car = $id_car;
    }



    abstract public function writeDbPlanification(): void;
    abstract public function writeCronPlanification(): void ;
    abstract public function togglePlanification(): void ;
}