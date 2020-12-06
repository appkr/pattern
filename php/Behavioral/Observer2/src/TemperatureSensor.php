<?php

namespace Behavioral\Observer2;

class TemperatureSensor extends Observable implements Sensor
{
    protected $observers;
    private $temperature;

    public function getState(): int
    {
        return $this->temperature;
    }

    public function setState(int $temperature): void
    {
        $this->temperature = $temperature;
    }
}