<?php

namespace Behavioral\Observer2;

interface Observer
{
    public function update(Sensor $sensor): void;
}