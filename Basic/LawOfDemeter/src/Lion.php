<?php

namespace Basic\LawOfDemeter;

class Lion extends Animal
{
    public function __construct($foodConsumption = 0)
    {
        parent::__construct(
            AnimalType::getInstance('LION'),
            $foodConsumption
        );
    }
}