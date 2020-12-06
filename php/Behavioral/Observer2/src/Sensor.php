<?php

namespace Behavioral\Observer2;

interface Sensor
{
    public function getState(): int;
    public function setState(int $state): void;
}