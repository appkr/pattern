<?php

namespace Behavioral\Command2;

class TurnLightOn implements Command
{
    private $light;

    public function __construct(Light $light)
    {
        $this->light = $light;
    }

    public function execute(): void
    {
        $this->light->on();
    }

    public function unexecute(): void
    {
        $this->light->off();
    }
}