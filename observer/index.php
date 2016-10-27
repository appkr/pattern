<?php

interface Subject
{
    public function attach($observable);
    public function detach($observer);
    public function notify();
}

interface Observer
{
    public function handle();
}

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

    public function fire()
    {
        // perform the login
        $this->notify();

        return;
    }
}

class LogHandler implements Observer
{
    public function handle()
    {
        var_dump('Log something important.');
    }
}

class EmailNotifier implements Observer
{
    public function handle()
    {
        var_dump('Fire off an email');
    }
}

$login = new Login;
$login->attach([
    new LogHandler,
    new EmailNotifier,
]);
$login->fire();