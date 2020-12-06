<?php

namespace Basic\LawOfDemeter\Bad;

use Basic\LawOfDemeter\Animal;

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

    public function consumeFoodStock($amountOfFoodToConsume)
    {
        $this->foodStock -= $amountOfFoodToConsume;
    }

    public function replenishFoodStock($amountOfFoodRefilled)
    {
        $this->foodStock += $amountOfFoodRefilled;
    }
}