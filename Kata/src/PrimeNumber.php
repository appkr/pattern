<?php

namespace Kata;

class PrimeNumber
{
    public function isPrime($n)
    {
        if ($n == 2) {
            return true;
        }
        if ($n == 3) {
            return true;
        }
        for ($i = 2; $i < $n; $i++) {
            if ($n % $i == 0) {
                return false;
            }
        }

        return true;
    }
}
