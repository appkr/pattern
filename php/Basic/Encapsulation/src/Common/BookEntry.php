<?php

namespace Basic\Encapsulation\Common;

use DateTime;

class BookEntry
{
    private $id;
    private $subscriber;
    private $term;
    private $paidAmount;
    private $lastUpdatedAt;
    private $isFulfilled;

    public function __construct(
        Citizen $subscriber, DateTime $term = null,
        int $paidAmount = 0, bool $isFulfilled = false
    ) {
        $this->id = uniqid();
        $this->subscriber = $subscriber;
        $this->term = $term ? $term->format('Y-m'): (new DateTime)->format('Y-m');
        $this->paidAmount = $paidAmount;
        $this->isFulfilled = $isFulfilled;
        $this->lastUpdatedAt = new DateTime;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getSubscriber(): Citizen
    {
        return $this->subscriber;
    }

    public function getTerm(): string
    {
        return $this->term;
    }

    public function getPaidAmount(): int
    {
        return $this->paidAmount;
    }

    public function isFulfilled(): bool
    {
        return $this->isFulfilled;
    }

    public function getLastUpdatedAt(): DateTime
    {
        return $this->lastUpdatedAt;
    }

    public function isEqualTo(BookEntry $other): bool
    {
        $test1 = $this->getSubscriber()->getName() == $other->getSubscriber()->getName();
        $test2 = $this->getTerm() == $other->getTerm();

        return $test1 && $test2;
    }
}