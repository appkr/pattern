<?php

namespace Behavioral\Command;

/**
 * The Receiver Class
 */
class Light
{
    public function turnOn()
    {
        echo 'The light is on.', PHP_EOL;
    }

    public function turnOff()
    {
        echo 'The light is off.', PHP_EOL;
    }
}