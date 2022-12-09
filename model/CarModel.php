<?php

class CarModel
{
    private int $_id;
    private string $_name;

    /**
     * @return int
     */
    public function getId(): int { return $this->_id; }

    /**
     * @return string
     */
    public function getName() : string { return  $this->_name; }
}