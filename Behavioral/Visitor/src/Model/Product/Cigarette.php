<?php

namespace Behavioral\Visitor\Model\Product;

use Behavioral\Visitor\ProductVisitor\ProductVisitor;

class Cigarette extends Product implements ProductElement
{
    public function accept(ProductVisitor $productVisitor): float
    {
        return $productVisitor->visitCigarette($this);
    }
}