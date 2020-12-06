<?php

namespace Basic\LawOfDemeter;

use Exception;

class Zoo
{
    const FOOD_STOCK_CAPACITY = 100;
    const SAFETY_FOOD_STOCK = 10;
    private $animals = [];
    private $foodStock;

    public function __construct($initialFoodStock = 0)
    {
        $this->foodStock = $initialFoodStock;
    }

    public function addAnimal(Animal $animal)
    {
        $this->animals[] = $animal;
    }

    public function getAllAnimals()
    {
        return $this->animals;
    }

    public function getFoodStock()
    {
        return $this->foodStock;
    }

    public function requestFoodForFeed()
    {
        $requiredFood = array_reduce(
            $this->animals,
            function (int $carry, Animal $animal) {
                return $carry + $animal->howMuchFoodDoYouNeed();
            },
            $initial = 0
        );

        if ($requiredFood > $this->foodStock) {
            throw new Exception(
                "식량이 부족합니다. 식량을 주문해 주세요. 
                요구량: {$requiredFood}, 보유량: {$this->foodStock}"
            );
        }

        return $this->foodStock -= $requiredFood;
    }

    public function getAmountOfFoodToRefill()
    {
        return self::FOOD_STOCK_CAPACITY - $this->foodStock;
    }

    public function replenishFoodStock($amountOfFoodBeingRefilled)
    {
        $this->foodStock += $amountOfFoodBeingRefilled;
    }
}