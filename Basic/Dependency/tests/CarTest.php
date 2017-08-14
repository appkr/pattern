<?php

namespace Basic\Dependency\Test;

use Basic\Dependency\Car;
use Basic\Dependency\Vehicle;
use PHPUnit\Framework\TestCase;

class CarTest extends TestCase
{
    function testCarClassCanBeInstantiable()
    {
        $car = new Car('Blue', 100, 'TRUCK', 10);

        $this->assertInstanceOf(Car::class, $car);
        $this->assertInstanceOf(Vehicle::class, $car);
    }
}