<?php

namespace Kata;

use PHPUnit\Framework\TestCase;

class PrimeNumberTest extends TestCase
{
    function testIsPrime()
    {
        $c = new PrimeNumber();

        assertTrue($c->isPrime(2));
        assertTrue($c->isPrime(3));
        assertFalse($c->isPrime(4));
    }
}
