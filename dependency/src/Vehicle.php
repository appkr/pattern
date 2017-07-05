<?php

namespace App;

class Vehicle
{
    protected $color;
    protected $price;
    protected $vehicleType;

    public function __construct(string $color, int $price, string $vehicleType)
    {
        $this->color = $color;
        $this->price = $price;
        $this->vehicleType = $vehicleType;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getVehicleType()
    {
        return $this->vehicleType;
    }
}