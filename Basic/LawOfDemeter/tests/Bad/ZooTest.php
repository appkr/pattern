<?php

namespace Basic\LawOfDemeter\Bad;

use Basic\LawOfDemeter\Animal;
use Basic\LawOfDemeter\Elephant;
use Basic\LawOfDemeter\Lion;
use Basic\LawOfDemeter\Tiger;
use Exception;
use PHPUnit\Framework\TestCase;

/**
 * @property Zoo zoo
 * @property ZooKeeper zooKeeper
 */
class ZooTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();

        $lion = new Lion($foodConsumption = 20);
        $tiger = new Tiger($foodConsumption = 30);

        $this->zoo = new Zoo($initialFoodStock = 100);
        $this->zoo->addAnimal($lion);
        $this->zoo->addAnimal($tiger);

        $this->zooKeeper = new ZooKeeper('Foo', $this->zoo);

        echo PHP_EOL;
    }

    /** @after */
    public function separatorAfterTest()
    {
        echo str_repeat('-', 80), PHP_EOL;
    }

    /** @test */
    public function a_zoo_has_two_animals()
    {
        $allAnimals = $this->zoo->getAllAnimals();
        $animalList = $this->animalListInTheZoo($allAnimals);
        echo "동물원에 {$animalList}가 살고 있습니다.", PHP_EOL;
        echo "지금 동물원에는 {$this->zoo->getFoodStock()}만큼의 먹이가 있습니다.", PHP_EOL;

        $this->assertTrue(2 === count($allAnimals));
    }

    /** @test */
    public function a_zoo_keeper_take_care_of_animals()
    {
        $this->zooKeeper->feedAnimals();
        echo "사육사 {$this->zooKeeper->getName()}가 배고픈 동물들을 골라 먹이를 줍니다.", PHP_EOL;
        echo "먹이를 준 후, 동물원에는 {$this->zoo->getFoodStock()}만큼의 먹이가 남았습니다.", PHP_EOL;

        $this->assertTrue(true);
    }

    /** @test */
    public function food_for_animals_can_be_out_of_stock()
    {
        echo '동물원에는 ', $this->zoo::SAFETY_FOOD_STOCK, '만큼의 먹이를 안전재고로 유지합니다.', PHP_EOL;

        $this->expectException(Exception::class);

        foreach (range(1, 10) as $index) {
            $this->zooKeeper->feedAnimals();
        }
    }

    /** @test */
    public function a_zoo_keeper_orders_food_when_needed()
    {
        $elephant = new Elephant($foodConsumption = 40);
        $this->zoo->addAnimal($elephant);
        echo '동물원에 코끼리가 들어왔습니다.', PHP_EOL;
        echo '이제 동물원에는 ', $this->animalListInTheZoo($this->zoo->getAllAnimals()), '가 살고 있습니다.', PHP_EOL;

        $this->zooKeeper->feedAnimals();
        $this->zooKeeper->orderFood();
        echo "사육사 {$this->zooKeeper->getName()}가 동물들에게 먹이를 준 후 부족한 먹이를 미리 주문합니다.", PHP_EOL;
        echo "동물원에는 이제 {$this->zoo->getFoodStock()}만큼의 먹이가 있습니다.", PHP_EOL;

        $this->assertTrue(100 === $this->zoo->getFoodStock());
    }

    private function animalListInTheZoo(array $animals)
    {
        $items = array_map(function (Animal $animal) {
            return $animal->getAnimalType() . ':' . $animal->getId();
        }, $animals);

        return implode(',', $items);
    }
}
