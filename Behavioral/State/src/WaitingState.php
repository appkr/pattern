<?php

namespace Behavioral\State;

use Common\Money;

class WaitingState implements AtmState
{
    private $atm;

    public function __construct(Atm $atm)
    {
        $this->atm = $atm;
    }

    public function insertCard(): void
    {
        $this->atm->changeState(new HasCardState($this->atm));
        $this->atm->feedbackToUser('카드를 인식했습니다. 비밀번호를 입력해 주세요.');
    }

    public function collectCard(): void
    {
        throw AtmException::cardNotProvided();
    }

    public function enterPin(int $pin): void
    {
        throw AtmException::cardNotProvided();
    }

    public function withdrawMoney(Money $money): void
    {
        throw AtmException::cardNotProvided();
    }

    public function saveMoney(Money $money): void
    {
        throw AtmException::cardNotProvided();
    }
}