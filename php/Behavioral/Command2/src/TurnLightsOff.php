<?php

namespace Behavioral\Command2;

class TurnLightsOff implements Command
{
    /** @var Light[] */
    private $lights;

    public function __construct(array $lights)
    {
        $this->lights = $lights;
    }

    public function execute(): void
    {
        /** @var Light $light */
        foreach ($this->lights as $light) {
            $light->off();
        }
    }

    public function unexecute(): void
    {
        /** @var Light $light */
        foreach ($this->lights as $light) {
            $light->on();
        }
    }
}