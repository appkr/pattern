<?php

namespace Behavioral\Visitor\Model\Product;

use Behavioral\Visitor\ProductVisitor\ProductVisitor;

class PerishableFood extends Product implements ProductElement
{
    public function accept(ProductVisitor $productVisitor): float
    {
        return $productVisitor->visitPerishableFood($this);
    }
}