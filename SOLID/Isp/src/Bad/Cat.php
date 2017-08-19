<?php

namespace SOLID\Isp\Bad;

class Cat extends Animal
{
    public function speak(): string
    {
        return 'meow meow';
    }

    public function swim(): string
    {
        throw new \Exception($this->getName() . ' cannot swim :(');
    }
}