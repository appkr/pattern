<?php

namespace Basic\Encapsulation\Good;

use Basic\Encapsulation\Common\Citizen;
use Basic\Encapsulation\Common\Wallet;

class Paperboy extends Citizen
{
    private $wallet;

    public function __construct(string $name, int $givenMoney)
    {
        parent::__construct($name);
        $this->wallet = new Wallet($givenMoney);
    }

    public function collectMonthlySubscriptionFee(
        NewspaperSubscriber $subscriber, int $monthlySubscriptionFee = 20
    ): NewspaperSubscriber {
        // 이 구현에서는 Paperboy는 NewspaperSubscriber의 상태를 쿼리하지 않습니다.

        try {
            // Paperboy: 고객님 신문값 20원 주세요.
            $subscriber->getMonthlySubscriptionFee($monthlySubscriptionFee);
            // Paperboy: '받은 신문값은 내 지갑에 넣어야지.'
            $this->earnMoney($monthlySubscriptionFee);
        } catch (NotEnoughMoneyException $e) {
            // NewspaperSubscriber에게 신문값 20원이 없습니다.
            // Handle exception & Rethrow exception
            throw $e;
        }

        return $subscriber;
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