<?php

namespace Bad;

use Common\Citizen;
use Common\Wallet;

class Paperboy extends Citizen
{
    private $wallet;

    public function __construct(string $name, int $givenMoney)
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

    public function collectMonthlySubscriptionFee(
        NewspaperSubscriber $subscriber, int $monthlySubscriptionFee = 20
    ): NewspaperSubscriber {
        // 이 코드에서는 Paperboy가 Subscriber에게 아래와 같이 신문 요금을 받아가는 격입니다.
        // Paperboy: "고객님 지갑 줘 보세요~"
        $subscriberWallet = $subscriber->getWallet();

        // Paperboy: '지갑에 신문값을 지불할 돈이 있나?'
        if ($subscriberWallet->getBalance() >= $monthlySubscriptionFee) {
            $subscriber->setWallet(
                // Paperboy: "신문값을 낼 돈은 있네요.", "신문 값을 가져가겠습니다~"
                $subscriber->getWallet()->moneyOut($monthlySubscriptionFee)
            );

            $this->setWallet(
                // Paperboy: '받은 신문값은 내 지갑에 넣어야지.'
                $this->getWallet()->moneyIn($monthlySubscriptionFee)
            );
        }

        // 신문값을 낼 돈이 충본이 있는지를 판단하는 것은 NewspaperSubscriber의 책임인데,
        // Paperby가 getter로 NewspaperSubscriber의 상태를 쿼리하고,
        // setter를 이용해서 NewspaperSubscriber의 상태를 변경하고 있습니다.
        // 즉, wallet이란 데이터에 의존하는 절차지향적인 코드입니다.
        return $subscriber;
    }
}