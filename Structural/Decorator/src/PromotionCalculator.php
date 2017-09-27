<?php

namespace Structural\Decorator;

class PromotionCalculator extends PriceCalculator
{
    private $offRate;

    public function __construct(HasPrice $product, int $offRateInPercent)
    {
        parent::__construct($product);
        $this->offRate = $offRateInPercent / 100;
    }

    public function getPrice(): float
    {
        return $this->product->getPrice() * (1 - $this->offRate);
    }
}