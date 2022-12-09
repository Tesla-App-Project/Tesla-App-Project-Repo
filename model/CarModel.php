<?php

class CarModel
{
    private int $I_id;
    private string $S_name;

    /**
     * @return int
     */
    public function getIId(): int { return $this->I_id; }

    /**
     * @return string
     */
    public function getSName() : string { return  $this->S_name; }
}