<?php

namespace Kata;

use PHPUnit\Framework\TestCase;

class PrimeNumberTest extends TestCase
{
    function testIsPrime()
    {
        $c = new PrimeNumber();
        $c->isPrime();
        assertTrue(true);
    }
}
