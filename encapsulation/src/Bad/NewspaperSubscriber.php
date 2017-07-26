<?php

namespace Bad;

use Common\Citizen;
use Common\Wallet;

class NewspaperSubscriber extends Citizen
{
    private $wallet;

    public function __construct(string $name, int $givenMoney = 0)
    {
        parent::__construct($name);
        $this->wallet = new Wallet($givenMoney);
    }

    public function getWallet(): Wallet
    {
        return $this->wallet;
    }

    public function setWallet(Wallet $newWallet): void
    {
        $this->wallet = $newWallet;
    }
}