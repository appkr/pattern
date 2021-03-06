<?php

namespace Basic\Dependency;

use PHPUnit\Framework\TestCase;

class OrderTest extends TestCase
{
    function testOrderClassCanBeInstantiable()
    {
        $customer = new Customer('c1');
        $order = new Order($customer);

        $this->assertInstanceOf(Order::class, $order);
        $this->assertEquals(
            $customer->getCustomerId(),
            $order->getCustomerId()
        );
    }
}