<?php

namespace Behavioral\State;

use Common\Money;

class ReadyToServeState implements AtmState
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
        $this->atm->feedbackToUser('안녕히 가세요.');
    }

    public function enterPin(int $pin): void
    {
        throw AtmException::pinAlreadyProvided();
    }

    public function withdrawMoney(Money $money): void
    {
        $this->atm->subtractMoney($money);
        $this->atm->feedbackToUser($money . '원이 지급되었습니다. 안녕히 가세요.');
        $this->atm->changeState(new WaitingState($this->atm));
    }

    public function saveMoney(Money $money): void
    {
        $this->atm->addMoney($money);
        $this->atm->feedbackToUser($money . '원이 입급되었습니다. 안녕히 가세요.');
        $this->atm->changeState(new WaitingState($this->atm));
    }
}