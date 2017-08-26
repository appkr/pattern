<?php

namespace Basic\LawOfDemeter;

use Exception;

abstract class Animal
{
    const MAX_FOOD_RATION_PER_ANIMAL = 100;

    private $id;
    private $animalType;
    private $foodConsumption;

    public function __construct(AnimalType $animalType, int $foodConsumption = 0)
    {
        $this->id = uniqid();
        $this->animalType = $animalType;

        if ($foodConsumption > self::MAX_FOOD_RATION_PER_ANIMAL) {
            throw new Exception(
                "동물당 일회 식량 공급량을 초과합니다: {$foodConsumption}"
            );
        }

        $this->foodConsumption = $foodConsumption;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAnimalType()
    {
        return $this->animalType;
    }

    public function howMuchFoodDoYouNeed()
    {
        return $this->isHungry() ? $this->foodConsumption : 0;
    }

    private function isHungry()
    {
        return array_rand([true, false]);
    }
}