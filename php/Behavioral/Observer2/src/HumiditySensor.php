<?php

namespace Behavioral\Observer2;

class HumiditySensor extends Observable implements Sensor
{
    protected $observers;
    private $humidity;

    public function getState(): int
    {
        return $this->humidity;
    }

    public function setState(int $humidity): void
    {
        $this->humidity = $humidity;
    }
}