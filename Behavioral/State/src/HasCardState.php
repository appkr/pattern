<?php

namespace Behavioral\State;

use Common\Money;

class HasCardState implements AtmState
{
    private $atm;

    public function __construct(Atm $atm)
    {
        $this->atm = $atm;
    }

    public function insertCard(): void
    {
        throw AtmException::cardAlreadyProvided();
    }

    public function collectCard(): void
    {
        $this->atm->changeState(new WaitingState($this->atm));
        $this->atm->feedbackToUser('카드가 추출되었습니다. 안녕히 가세요.');
    }

    public function enterPin(int $pin): void
    {
        $this->atm->validatePin($pin);
        $this->atm->changeState(new ReadyToServeState($this->atm));
        $this->atm->feedbackToUser('비밀번호가 확인되었습니다. 입금 또는 출금을 선택해주세요.');
    }

    public function withdrawMoney(Money $money): void
    {
        throw AtmException::pinNotProvided();
    }

    public function saveMoney(Money $money): void
    {
        throw AtmException::pinNotProvided();
    }
}