<?php

namespace Behavioral\Visitor\Model\Product;

use Behavioral\Visitor\ProductVisitor\ProductVisitor;

class AlcoholicBeverage extends Product implements ProductElement
{
    public function accept(ProductVisitor $productVisitor): float
    {
        return $productVisitor->visitAlcoholicBeverage($this);
    }
}