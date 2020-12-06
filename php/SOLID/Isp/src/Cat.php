<?php

namespace SOLID\Isp;

class Cat extends Animal implements CanSpeak
{
    public function speak(): string
    {
        return 'meow meow';
    }
}