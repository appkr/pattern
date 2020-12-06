<?php

namespace SOLID\Isp;

class Dog extends Animal implements CanSpeak, CanSwim
{
    public function speak(): string
    {
        return 'bow wow';
    }

    public function swim(): string
    {
        return 'very well';
    }
}