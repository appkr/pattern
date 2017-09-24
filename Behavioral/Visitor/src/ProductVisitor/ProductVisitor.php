<?php

namespace Behavioral\Visitor\ProductVisitor;

use Behavioral\Visitor\Model\Product\AlcoholicBeverage;
use Behavioral\Visitor\Model\Product\Cigarette;
use Behavioral\Visitor\Model\Product\PackagedFood;
use Behavioral\Visitor\Model\Product\PerishableFood;

interface ProductVisitor
{
    public function visitAlcoholicBeverage(AlcoholicBeverage $alcoholicBeverage): float;
    public function visitCigarette(Cigarette $cigarette): float;
    public function visitPackagedFood(PackagedFood $packagedFood): float;
    public function visitPerishableFood(PerishableFood $perishableFood): float;
}