<?php

namespace Behavioral\Visitor\OrderVisitor;

use Behavioral\Visitor\Model\Order\Order;

class DeliveryFeeCalculator implements OrderVisitor
{
    const DELIVERY_FEE_PER_PACKAGE = 3000;

    public function visit(Order $order): float
    {
        return self::DELIVERY_FEE_PER_PACKAGE * $order->getNumberOfPackage();
    }
}