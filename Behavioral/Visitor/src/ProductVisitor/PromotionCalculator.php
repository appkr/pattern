<?php

namespace Behavioral\Visitor\ProductVisitor;

use Behavioral\Visitor\Model\Product\AlcoholicBeverage;
use Behavioral\Visitor\Model\Product\Cigarette;
use Behavioral\Visitor\Model\Product\PackagedFood;
use Behavioral\Visitor\Model\Product\PerishableFood;

class PromotionCalculator implements ProductVisitor
{
    const VAT_RATE = 0.1;

    private $offRate;

    public function __construct($offRateInPercent = 0)
    {
        $this->offRate = $offRateInPercent / 100;
    }

    public function visitAlcoholicBeverage(AlcoholicBeverage $alcoholicBeverage): float
    {
        // 주류 가격 할인은 법으로 금지되어 있다고 가정합니다.
        return $alcoholicBeverage->getPrice() * (1 + self::VAT_RATE);
    }

    public function visitCigarette(Cigarette $cigarette): float
    {
        // 담배 가격 할인은 법으로 금지되어 있다고 가정합니다.
        return $cigarette->getPrice() * (1 + self::VAT_RATE);
    }

    public function visitPackagedFood(PackagedFood $packagedFood): float
    {
        return $packagedFood->getPrice() * (1 - $this->offRate) * (1 + self::VAT_RATE);
    }

    public function visitPerishableFood(PerishableFood $perishableFood): float
    {
        return $perishableFood->getPrice() * (1 - $this->offRate);
    }
}