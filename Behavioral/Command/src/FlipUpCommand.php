<?php

namespace Behavioral\Command;

/**
 * ConcreteCommand #1
 */
class FlipUpCommand implements Command
{
    private $light;

    public function __construct(Light $light)
    {
        $this->light = $light;
    }

    public function execute(): void
    {
        $this->light->turnOn();
    }
}