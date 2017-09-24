<?php

namespace Behavioral\Visitor\Model\Order;

use Behavioral\Visitor\OrderVisitor\OrderVisitor;
use Behavioral\Visitor\ProductVisitor\ProductVisitor;

interface OrderElement
{
    public function accept(
        ProductVisitor $productVisitor,
        OrderVisitor $orderVisitor
    ): float;
}