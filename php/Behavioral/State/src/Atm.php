<?php

namespace Behavioral\State;

use Common\Money;

final class Atm
{
    private const CORRECT_PIN = 1234;

    private $balance;
    private $state;

    public function __construct(Money $initialMoney)
    {
        $this->balance = $initialMoney;
        $this->state = new WaitingState($this);

        if ($this->balance->isEqualOrSmallerThan(new Money(0))) {
            $this->state = new OutOfMoneyState($this);
        }
    }

    public function changeState(AtmState $newAtmState)
    {
        $this->state = $newAtmState;
    }

    public function insertCard()
    {
        $this->state->insertCard();
    }

    public function collectCard()
    {
        $this->state->collectCard();
    }

    public function enterPin(int $pin)
    {
        $this->state->enterPin($pin);
    }

    public function withdrawMoney(Money $moneyToWithdraw)
    {
        $this->state->withdrawMoney($moneyToWithdraw);

        return $moneyToWithdraw;
    }

    public function saveMoney(Money $moneyToSave)
    {
        $this->state->saveMoney($moneyToSave);
    }

    public function subtractMoney(Money $moneyToSubtract)
    {
        if (false === ($this->getCalledObject() instanceof AtmState)) {
            throw AtmException::illegalAccess();
        }

        if ($this->balance->isSmallerThan($moneyToSubtract)) {
            throw AtmException::insufficientBalance();
        }

        $this->balance = $this->balance->subtract($moneyToSubtract);

        if ($this->balance->isEqualTo(new Money(0))) {
            $this->state = new OutOfMoneyState($this);
        }
    }

    public function addMoney(Money $moneyToAdd)
    {
        if (false === ($this->getCalledObject() instanceof AtmState)) {
            throw AtmException::illegalAccess();
        }

        $this->balance = $this->balance->add($moneyToAdd);
    }

    public function validatePin(int $pin)
    {
        if (self::CORRECT_PIN !== $pin) {
            throw AtmException::incorrectPin();
        }
    }

    public function feedbackToUser(string $message)
    {
        echo $message, PHP_EOL;
    }

    private function getCalledObject()
    {
        // PHP 언어는 Private Package 를 지원하지 않으므로 클라이언트가
        // addMoney(), subtractMoney()와 같은 Internal API 호출을 막을 방법이 없습니다.
        // 이 헬퍼는 addMoney(), subtractMoney() 함수를 외부에서 호출할 수 없도록 하기 위함 꼼수입니다.
        return debug_backtrace()[2]['object'];
    }
}