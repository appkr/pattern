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
        assertTrue($c->isPrime(5));
        assertFalse($c->isPrime(6));
        assertTrue($c->isPrime(7));
        assertFalse($c->isPrime(8));
        assertFalse($c->isPrime(9));
    }
}
