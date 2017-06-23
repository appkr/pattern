<?php

namespace App;

/**
 * ConcreteCommand #2
 */
class FlipDownCommand implements Command
{
    private $light;

    public function __construct(Light $light)
    {
        $this->light = $light;
    }

    public function execute(): void
    {
        $this->light->turnOff();
    }
}