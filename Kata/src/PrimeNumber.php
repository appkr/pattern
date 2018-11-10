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
        return [$n];
    }
}
