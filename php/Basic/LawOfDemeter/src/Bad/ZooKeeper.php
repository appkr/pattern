<?php

namespace Basic\LawOfDemeter\Bad;

use Basic\LawOfDemeter\Animal;
use Exception;

class ZooKeeper
{
    private $name;
    private $zoo;

    public function __construct(string $name, Zoo $zoo)
    {
        $this->name = $name;
        $this->zoo = $zoo;
    }

    public function getName()
    {
        return $this->name;
    }

    public function feedAnimals()
    {
        // 여기서 Law Of Demeter 원칙을 위반하고 있습니다.
        // Zoo 타입이 집합으로 가지고 있는 Animal 타입의 howMushFoodDoYouNeed 함수를
        // ZooKeeper 클래스에서 호출하고 있습니다.
        $requiredFood = array_reduce(
            $this->zoo->getAllAnimals(),
            function (int $carry, Animal $animal) {
                return $carry + $animal->howMuchFoodDoYouNeed();
            },
            $initial = 0
        );

        $currentFoodStockInTheZoo = $this->zoo->getFoodStock();

        // Tell Don't Ask 원칙도 위반하고 있습니다.
        if ($requiredFood > $currentFoodStockInTheZoo) {
            throw new Exception(
                "식량이 부족합니다. 식량을 주문해 주세요. 
                요구량: {$requiredFood}, 보유량: {$currentFoodStockInTheZoo}"
            );
        }

        $this->zoo->consumeFoodStock($requiredFood);
    }

    public function orderFood()
    {
        $amountOfFoodToOrder = $this->zoo::FOOD_STOCK_CAPACITY
            - $this->zoo->getFoodStock();

        $this->zoo->replenishFoodStock($amountOfFoodToOrder);
    }
}