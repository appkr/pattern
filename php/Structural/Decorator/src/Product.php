<?php

namespace Structural\Decorator;

class Product implements HasPrice
{
    private $id;
    private $name;
    private $price;

    public function __construct(string $name, float $price)
    {
        $this->id = uniqid();
        $this->name = $name;
        $this->price = $price;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPrice(): float
    {
        return $this->price;
    }
}