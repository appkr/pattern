<?php

namespace Kata;

use PHPUnit\Framework\TestCase;

class PrimeNumberTest extends TestCase
{
    const PRIMES = [
        11, 13, 17, 19, 23, 29, 31, 37, 41, 43,
        47, 53, 59, 61, 67, 71, 73, 79, 83, 89,
        97, 101, 103, 107, 109, 113, 127, 131, 137, 139,
        149, 151, 157, 163, 167, 173, 179, 181, 191, 193,
        197, 199, 211, 223, 227, 229, 233, 239, 241, 251,
        257, 263, 269, 271, 277, 281, 283, 293, 307, 311,
        313, 317, 331, 337, 347, 349, 353, 359, 367, 373,
        379, 383, 389, 397, 401, 409, 419, 421, 431, 433,
        439, 443, 449, 457, 461, 463, 467, 479, 487, 491,
        499, 503, 509, 521, 523, 541, 547, 557, 563, 569,
        571, 577, 587, 593, 599, 601, 607, 613, 617, 619,
        631, 641, 643, 647, 653, 659, 661, 673, 677, 683,
        691, 701, 709, 719, 727, 733, 739, 743, 751, 757,
        761, 769, 773, 787, 797, 809, 811, 821, 823, 827,
        829, 839, 853, 857, 859, 863, 877, 881, 883, 887,
        907, 911, 919, 929, 937, 941, 947, 953, 967, 971,
        977, 983, 991, 997
    ];

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
        assertFalse($c->isPrime(10));

        foreach (self::PRIMES as $prime) {
            assertTrue($c->isPrime($prime));
        }

        $nonPrimes = array_diff(range(10, 1000), self::PRIMES);

        foreach ($nonPrimes as $nonPrime) {
            assertFalse($c->isPrime($nonPrime));
        }
    }

    function testFactorize()
    {
        $c = new PrimeNumber();

        assertEquals([2], $c->factorize(2));
        assertEquals([3], $c->factorize(3));
        assertEquals([2, 2], $c->factorize(4));
        assertEquals([5], $c->factorize(5));
        assertEquals([2, 3], $c->factorize(6));
        assertEquals([7], $c->factorize(7));
        assertEquals([2, 2, 2], $c->factorize(8));
        assertEquals([3, 3], $c->factorize(9));
        assertEquals([2, 5], $c->factorize(10));

        foreach (self::PRIMES as $prime) {
            assertEquals([$prime], $c->factorize($prime));
        }

        $primes = array_merge([2,3,5,7], self::PRIMES);
        foreach (range(1, 10) as $i) {
            // 소수 목록 셔플링
            shuffle($primes);
            // 앞에서부터 3개만 추출. e.g. [7, 2, 3]
            $set = array_slice($primes, 0, 3);
            // 정렬. e.g. [2, 3, 7]
            sort($set);
            // array_product([2, 3, 7]) = 2 * 3 * 7 = 42
            assertEquals($set, $c->factorize(array_product($set)));
        }
    }
}
