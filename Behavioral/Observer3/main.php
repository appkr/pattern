<?php

class FooEvent {
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

interface Handler {
    public function handle(string $eventData);
}

class PrintHandler implements Handler {
    public function handle(string $eventData) {
        echo $eventData, PHP_EOL;
    }
}

class AllCapsHandler implements Handler {
    public function handle(string $eventData) {
        echo strtoupper($eventData), PHP_EOL;
    }
}

$printHandler = new PrintHandler();
$capsHandler = new AllCapsHandler();

$event = new FooEvent('I am FooEvent');
$event->registerHandlers($printHandler);
$event->registerHandlers($capsHandler);

$event->notifyHandler();
// I am FooEvent
// I AM FOOEVENT
