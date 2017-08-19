<?php

namespace SOLID\Isp\Test;

use PHPUnit\Framework\TestCase;
use SOLID\Isp\Bad\Cat;
use SOLID\Isp\Bad\Dog;

class BadAnimalTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
        echo PHP_EOL;
    }

    /** @test */
    public function animals_do_various_things()
    {
        $kitty = new Cat('Kitty');
        $doggy = new Dog('Doggy');

        echo class_basename(__CLASS__), ": {$doggy->getName()} speaks '{$doggy->speak()}'\n";
        echo class_basename(__CLASS__), ": {$doggy->getname()} swims {$doggy->swim()}\n";

        echo class_basename(__CLASS__), ": {$kitty->getName()} speaks '{$kitty->speak()}'\n";

        try {
            $kitty->swim();
        } catch (\Exception $e) {
            echo class_basename(__CLASS__), ": {$e->getMessage()}\n";
        }

        $this->assertTrue(true);
    }
}
