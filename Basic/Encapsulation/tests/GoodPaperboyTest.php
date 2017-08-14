<?php

namespace Basic\Encapsulation\Test;

use Basic\Encapsulation\Good\NotEnoughMoneyException;
use Basic\Encapsulation\Good\NewspaperSubscriber;
use Basic\Encapsulation\Good\Paperboy;
use PHPUnit\Framework\TestCase;

/**
 * @property Paperboy $paperboy
 * @property NewspaperSubscriber $subscriber
 */
class GoodPaperboyTest extends TestCase
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

        $this->assertEquals(80, $aSubscriber->getBalance());
        $this->assertEquals(120, $this->paperboy->getBalance());
    }

    /** @test */
    public function paperboy_cannot_collect_subscription_fee_when_subscriber_does_not_have_enough_money()
    {
        $this->expectException(NotEnoughMoneyException::class);
        $this->paperboy->collectMonthlySubscriptionFee(
            $this->subscriber, 120
        );
    }
}