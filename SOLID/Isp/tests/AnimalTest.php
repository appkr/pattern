<?php

namespace SOLID\Isp\Test;

use PHPUnit\Framework\TestCase;
use SOLID\Isp\Cat;
use SOLID\Isp\Dog;

class AnimalTest extends TestCase
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

        echo class_basename(__CLASS__), ": {$kitty->getName()} speaks '{$kitty->speak()}'\n";
        echo class_basename(__CLASS__), ": {$doggy->getName()} speaks '{$doggy->speak()}'\n";
        echo class_basename(__CLASS__), ": {$doggy->getname()} swims {$doggy->swim()}\n";

        $this->assertTrue(true);
    }
}
