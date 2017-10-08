<?php

namespace Behavioral\Observer1;

use Exception;

class Login implements Subject
{
    protected $observers = [];

    public function attach($observable)
    {
        if (is_array($observable)) {
            foreach($observable as $observer) {
                $this->attach($observer);
            }

            return;
        }

        if (! $observable instanceof Observer) {
            throw new Exception('Expecting instance of Observer, but given type mismatch.');
        }

        $this->observers[] = $observable;
    }

    public function detach($observer)
    {
        $key = array_search($observer, $this->observers);

        if (! $key) {
            throw new Exception('Not registered observer.');
        }

        unset($this->observers[$key]);
    }

    public function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->handle();
        }
    }
}