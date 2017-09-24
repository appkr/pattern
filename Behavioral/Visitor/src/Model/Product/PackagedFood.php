<?php

namespace Behavioral\Visitor\Model\Product;

use Behavioral\Visitor\ProductVisitor\ProductVisitor;

class PackagedFood extends Product implements ProductElement
{
    public function accept(ProductVisitor $productVisitor): float
    {
        return $productVisitor->visitPackagedFood($this);
    }
}