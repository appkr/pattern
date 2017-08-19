<?php

namespace SOLID\Isp\Bad;

class Dog extends Animal
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