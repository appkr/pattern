<?php

namespace Behavioral\Observer2;

use Exception;

abstract class Observable
{
    protected $observers;

    public function add(Observer $observer): void
    {
        $this->observers[] = $observer;
    }

    public function remove(Observer $observer): void
    {
        $key = array_search($observer, $this->observers);

        if (! $key) {
            throw new Exception('등록되지 않은 Observer 입니다.');
        }

        unset($this->observers[$key]);
    }

    public function notify(): void
    {
        /** @var Observer $observer */
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }
}