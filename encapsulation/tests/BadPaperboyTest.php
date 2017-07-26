<?php

namespace Test;

use Bad\NewspaperSubscriber;
use Bad\Paperboy;
use PHPUnit\Framework\TestCase;

/**
 * @property Paperboy $paperboy
 * @property NewspaperSubscriber $subscriber
 */
class BadPaperboyTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();

        $this->paperboy = new Paperboy('Foo', 100);
        $this->subscriber = new NewspaperSubscriber('Bar', 100);
    }

    /** @test */
    public function paperboy_can_collect_subscription_fee()
    {
        $aSubscriber = $this->paperboy->collectMonthlySubscriptionFee(
            $this->subscriber, 20
        );

        $this->assertEquals(80, $aSubscriber->getWallet()->getBalance());
        $this->assertEquals(120, $this->paperboy->getWallet()->getBalance());
    }

    /** @test */
    public function paperboy_cannot_collect_subscription_fee_when_subscriber_does_not_have_enough_money()
    {
        $aSubscriber = $this->paperboy->collectMonthlySubscriptionFee(
            $this->subscriber, 120
        );

        $this->assertEquals(100, $aSubscriber->getWallet()->getBalance());
        $this->assertEquals(100, $this->paperboy->getWallet()->getBalance());
    }
}