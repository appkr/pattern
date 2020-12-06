<?php

namespace Structural\Decorator;

abstract class PriceCalculator implements HasPrice
{
    protected $product;

    public function __construct(HasPrice $product)
    {
        $this->product = $product;
    }
}