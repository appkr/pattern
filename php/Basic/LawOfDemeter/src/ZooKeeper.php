<?php

namespace Basic\LawOfDemeter;

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
        try {
            // 배고픈 동물만 골라, 그들의 음식 수요량을 계산하는 것은 Animal 타입을 집합으로 가진
            // Zoo 타입의 Responsibility 입니다. 이제 ZooKeeper가 Aninal의 함수를 직접
            // 호출하지 않습니다.
            $amountOfFoodToFeed = $this->zoo->requestFoodForFeed();

            // 이 예제에서는 동물의 배고픔 상태를 변경하는 함수를 구현하지는 않았습니다만,
            // 동물원으로부터 받은 먹이(=$amountOfFoodToFeed)를 각 동물들에게 나눠주고,
            // 동물들의 배고픔 상태(e.g. isHungry)를 변경하는 동작을 할겁니다.
        } catch (Exception $e) {
            // handle exception
            throw $e;
        }
    }

    public function orderFood()
    {
        $amountOfFoodToOrder = $this->zoo->getAmountOfFoodToRefill();

        $this->zoo->replenishFoodStock($amountOfFoodToOrder);
    }
}