<?php

namespace Behavioral\Visitor\Model\Product;

abstract class Product
{
    private $id;
    private $name;
    private $price;
    private $size;

    public function __construct(string $name, float $price, int $size = 1)
    {
        // 1 ~ 10 까지 상대적인 $size가 있다고 가정합니다.
        $this->id = uniqid(class_basename(get_called_class()) . '-');
        $this->name = $name;
        $this->price = $price;
        $this->size = $size;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getSize()
    {
        return $this->size;
    }
}