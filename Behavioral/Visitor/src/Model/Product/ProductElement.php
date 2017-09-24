<?php

namespace Behavioral\Visitor\Model\Product;

use Behavioral\Visitor\ProductVisitor\ProductVisitor;

interface ProductElement
{
    public function accept(ProductVisitor $productVisitor): float;
}