<?php

namespace Behavioral\Visitor\OrderVisitor;

use Behavioral\Visitor\Model\Order\Order;

interface OrderVisitor
{
    public function visit(Order $order): float;
}