<?php

namespace Behavioral\State;

use Common\Money;
use Exception;
use PHPUnit\Framework\TestCase;

/**
 * @property Atm atm
 */
final class AtmTest extends TestCase
{
    const INITIAL_MONEY = 10000;
    const CORRECT_PIN = 1234;
    const WRONG_PIN = 0000;

    public function setUp()
    {
        parent::setUp();
        $this->atm = new Atm(new Money(self::INITIAL_MONEY));
        echo PHP_EOL;
    }

    public function tearDown()
    {
        echo str_repeat('-', 80), PHP_EOL;
        parent::tearDown();
    }

    /** @test */
    public function an_atm_user_can_withdraw_money()
    {
        echo __METHOD__, PHP_EOL;
        $moneyToWithdraw = new Money(1000);
        $this->atm->insertCard();
        $this->atm->collectCard();
        $this->atm->insertCard();
        $this->atm->enterPin(self::CORRECT_PIN);
        $moneyWithdrawn = $this->atm->withdrawMoney($moneyToWithdraw);

        $this->assertTrue($moneyWithdrawn->isEqualTo($moneyToWithdraw));
    }

    /** @test */
    public function an_atm_user_cannot_call_protected_method()
    {
        echo __METHOD__, PHP_EOL;
        $moneyToWithdraw = new Money(1000);
        $this->atm->insertCard();
        $this->atm->enterPin(self::CORRECT_PIN);

        try {
            $this->expectException(AtmException::class);
            $this->atm->subtractMoney($moneyToWithdraw);
        } catch (Exception $e) {
            echo $e->getMessage(), PHP_EOL;
            throw $e;
        }
    }

    /** @test */
    public function an_atm_user_must_provide_a_card()
    {
        echo __METHOD__, PHP_EOL;
        $this->expectException(AtmException::class);
        $moneyToWithdraw = new Money(1000);

        try {
            $this->atm->withdrawMoney($moneyToWithdraw);
        } catch (Exception $e) {
            echo $e->getMessage(), PHP_EOL;
            throw $e;
        }
    }

    /** @test */
    public function an_atm_user_cannot_provide_more_than_one_card()
    {
        echo __METHOD__, PHP_EOL;
        $this->expectException(AtmException::class);

        try {
            $this->atm->insertCard();
            $this->atm->insertCard();
        } catch (Exception $e) {
            echo $e->getMessage(), PHP_EOL;
            throw $e;
        }
    }

    /** @test */
    public function an_atm_user_must_provide_a_pin()
    {
        echo __METHOD__, PHP_EOL;
        $this->expectException(AtmException::class);

        try {
            $this->atm->insertCard();
            $this->atm->enterPin(self::WRONG_PIN);
        } catch (Exception $e) {
            echo $e->getMessage(), PHP_EOL;
            throw $e;
        }
    }

    /** @test */
    public function an_atm_user_cannot_provide_pin_again()
    {
        echo __METHOD__, PHP_EOL;
        $this->expectException(AtmException::class);

        try {
            $this->atm->insertCard();
            $this->atm->enterPin(self::CORRECT_PIN);
            $this->atm->enterPin(self::CORRECT_PIN);
        } catch (Exception $e) {
            echo $e->getMessage(), PHP_EOL;
            throw $e;
        }
    }

    /** @test */
    public function an_atm_cannot_spit_out_more_than_it_has()
    {
        echo __METHOD__, PHP_EOL;
        $moneyToWithdraw = new Money(self::INITIAL_MONEY + 1);
        $this->expectException(AtmException::class);

        try {
            $this->atm->insertCard();
            $this->atm->enterPin(self::CORRECT_PIN);
            $this->atm->withdrawMoney($moneyToWithdraw);
        } catch (Exception $e) {
            echo $e->getMessage(), PHP_EOL;
            throw $e;
        }
    }

    /** @test */
    public function an_atm_can_save_money_even_the_machine_has_no_money()
    {
        echo __METHOD__, PHP_EOL;
        $moneyToWithdraw = new Money(self::INITIAL_MONEY);

        // 현금지급기의 잔액을 0으로 만들고, 상태를 OutOfMoneyState 로 만듭니다.
        $this->atm->insertCard();
        $this->atm->enterPin(self::CORRECT_PIN);
        $this->atm->withdrawMoney($moneyToWithdraw);

        $this->atm->insertCard();
        $this->atm->enterPin(self::CORRECT_PIN);
        $this->atm->saveMoney(new Money(1000));

        $this->assertTrue(true);
    }
}