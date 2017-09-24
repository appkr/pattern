<?php

namespace Behavioral\Visitor\ProductVisitor;

use Behavioral\Visitor\Model\Product\AlcoholicBeverage;
use Behavioral\Visitor\Model\Product\Cigarette;
use Behavioral\Visitor\Model\Product\PackagedFood;
use Behavioral\Visitor\Model\Product\PerishableFood;

class VatCalculator implements ProductVisitor
{
    const VAT_RATE = 0.1;

    public function visitAlcoholicBeverage(AlcoholicBeverage $alcoholicBeverage): float
    {
        return $alcoholicBeverage->getPrice() * (1 + self::VAT_RATE);
    }

    public function visitCigarette(Cigarette $cigarette): float
    {
        return $cigarette->getPrice() * (1 + self::VAT_RATE);
    }

    public function visitPackagedFood(PackagedFood $packagedFood): float
    {
        return $packagedFood->getPrice() * (1 + self::VAT_RATE);
    }

    public function visitPerishableFood(PerishableFood $perishableFood): float
    {
        // 농수산물은 부가세가 없다고 가정합니다.
        return $perishableFood->getPrice();
    }
}