<?php

namespace Basic\LawOfDemeter;

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
    }

    /** @test */
    public function a_zoo_has_two_animals()
    {
        $this->assertTrue(2 === count($this->zoo->getAllAnimals()));
    }

    /** @test */
    public function a_zoo_keeper_take_care_of_animals()
    {
        $this->zooKeeper->feedAnimals();

        $this->assertTrue(true);
    }

    /** @test */
    public function food_for_animals_can_be_out_of_stock()
    {
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

        $this->zooKeeper->feedAnimals();
        $this->zooKeeper->orderFood();

        $this->assertTrue(100 === $this->zoo->getFoodStock());
    }
}
