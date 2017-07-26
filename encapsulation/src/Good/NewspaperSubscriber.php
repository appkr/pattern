<?php

namespace Good;

use Common\Citizen;
use Common\Wallet;

class NewspaperSubscriber extends Citizen
{
    private $wallet;

    public function __construct(string $name, int $givenMoney)
    {
        parent::__construct($name);
        $this->wallet = new Wallet($givenMoney);
    }

    public function getMonthlySubscriptionFee(int $monthlySubscriptionFee): void
    {
        if ($this->getBalance() <= $monthlySubscriptionFee) {
            throw new NotEnoughMoneyException;
        }

        $this->spendMoney($monthlySubscriptionFee);
    }

    public function getBalance(): int
    {
        return $this->wallet->getBalance();
    }

    private function earnMoney(int $money): void
    {
        $this->wallet = $this->wallet->moneyIn($money);
    }

    private function spendMoney(int $money): void
    {
        $this->wallet = $this->wallet->moneyOut($money);
    }
}