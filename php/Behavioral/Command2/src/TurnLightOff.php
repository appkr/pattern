<?php

namespace Behavioral\Command2;

class TurnLightOff implements Command
{
    private $light;

    public function __construct(Light $light)
    {
        $this->light = $light;
    }

    public function execute(): void
    {
        $this->light->off();
    }

    public function unexecute(): void
    {
        $this->light->on();
    }
}