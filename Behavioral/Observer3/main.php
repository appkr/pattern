<?php

abstract class Event {
    private $eventData;
    /** @var Handler[] */
    private $handlers;

    public function __construct(string $eventData) {
        $this->eventData = $eventData;
    }

    public function registerHandlers(Handler $handler) {
        $this->handlers[] = $handler;
    }

    public function notifyHandler() {
        foreach ($this->handlers as $handler) {
            $handler->handle($this->eventData);
        }
    }
}

class FooEvent extends Event {}
class BarEvent extends Event {}

interface Handler {
    public function handle(string $eventData);
}

class FooHandler implements Handler {
    public function handle(string $eventData) {
        echo "Handling {$eventData}", PHP_EOL;
    }
}

class BarHandler implements Handler {
    public function handle(string $eventData) {
        echo "Handling {$eventData}", PHP_EOL;
    }
}

$fooHandler = new FooHandler();
$fooEvent = new FooEvent('FooEvent data');
$fooEvent->registerHandlers($fooHandler);
$fooEvent->notifyHandler(); // Handling FooEvent data

$barHandler = new BarHandler();
$barEvent = new BarEvent('BarEvent data');
$barEvent->registerHandlers($barHandler);
$barEvent->notifyHandler(); // Handling BarEvent data
