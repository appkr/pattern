<?php

namespace App;

/**
 * The Receiver Class
 */
class Light
{
    public function turnOn()
    {
        var_dump('The light is on.');
    }

    public function turnOff()
    {
        var_dump('The light is off.');
    }
}