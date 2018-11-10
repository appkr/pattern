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
        $divider = 2;
        while ($n > 1) {
            while ($n % $divider == 0) {
                $primes[] = $divider;
                $n /= $divider;
            }
            $divider++;
        }

        return $primes;
    }
}
