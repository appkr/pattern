<?php

namespace Basic\Dependency;

class Car extends Vehicle
{
    protected $discount;

    public function __construct(
        string $color, int $price, string $vehicleType, int $discount
    ) {
        parent::__construct($color, $price, $vehicleType);
        $this->discount = $discount;
    }

    public function getDiscount()
    {
        return $this->discount;
    }

    public function getPrice()
    {
        return $this->price - $this->discount;
    }
}