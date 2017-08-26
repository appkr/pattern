<?php

namespace Basic\LawOfDemeter;

class Elephant extends Animal
{
    public function __construct($foodConsumption = 0)
    {
        parent::__construct(
            AnimalType::getInstance('ELEPHANT'),
            $foodConsumption
        );
    }
}