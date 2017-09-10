<?php

namespace Behavioral\State;

use Common\Money;

interface AtmState
{
    public function insertCard(): void;
    public function collectCard(): void;
    public function enterPin(int $pin): void;
    public function withdrawMoney(Money $money): void;
    public function saveMoney(Money $money): void;
}