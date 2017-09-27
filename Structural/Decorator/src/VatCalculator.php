<?php

namespace Structural\Decorator;

class VatCalculator extends PriceCalculator
{
    const VAT_RATE = 0.1;

    public function getPrice(): float
    {
        return $this->product->getPrice() * (1 + self::VAT_RATE);
    }
}