<?php

namespace SOLID\Isp\Bad;

abstract class Animal
{
    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    abstract public function speak(): string;

    abstract public function swim(): string;
}