<?php

namespace Behavioral\Observer2;

class ScreenDisplay implements Observer
{
    use Presentable;

    public function update(Sensor $sensor): void
    {
        echo $this->formatContent($sensor), PHP_EOL;
    }
}