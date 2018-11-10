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
        for ($divider = 2; $n > 1; $divider++) {
            for (; $n % $divider == 0; $n /= $divider) {
                $primes[] = $divider;
            }
        }

        return $primes;
    }
}
