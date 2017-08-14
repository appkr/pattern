<?php

namespace Basic\Encapsulation\Common;

class Wallet
{
    private $money;

    public function __construct(int $money = 0)
    {
        $this->money = $money;
    }

    public function moneyIn(int $money): Wallet
    {
        return new static($this->money + $money);
    }

    public function moneyOut(int $money): Wallet
    {
        return new static($this->money - $money);
    }

    public function getBalance(): int
    {
        return $this->money;
    }

    public function format(): string
    {
        return number_format($this->money) . '원';
    }

    public function isEqualTo(Wallet $other): bool
    {
        return $this->money === $other->getBalance();
    }

    public function __toString(): string
    {
        return $this->format();
    }
}