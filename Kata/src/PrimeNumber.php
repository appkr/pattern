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
        if ($n % 2 == 0) {
            return false;
        }
        if ($n % 3 == 0) {
            return false;
        }

        return true;
    }
}
