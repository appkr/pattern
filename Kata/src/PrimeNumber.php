<?php

namespace Kata;

class PrimeNumber
{
    public function isPrime($n)
    {
        if ($n == 2 || $n == 3) {
            return true;
        }
        for ($i = 2; $i <= sqrt($n); $i++) {
            if ($n % $i == 0) {
                return false;
            }
        }

        return true;
    }

    public function factorize($n)
    {
        $primes = [];
        while ($n % 2 == 0) {
            $primes[] = 2;
            $n /= 2;
        }
        if ($n > 1) {
            $primes[] = $n;
        }

        return $primes;
    }
}
