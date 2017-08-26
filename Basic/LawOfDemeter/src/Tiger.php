<?php

namespace Basic\LawOfDemeter;

class Tiger extends Animal
{
    public function __construct($foodConsumption = 0)
    {
        parent::__construct(
            AnimalType::getInstance('TIGER'),
            $foodConsumption
        );
    }
}