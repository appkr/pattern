<?php

class FooEvent {
    private $eventData;
    /** @var FooEventHandler[] */
    private $handlers;

    public function __construct(string $eventData) {
        $this->eventData = $eventData;
    }

    public function registerHandlers(FooEventHandler $handler) {
        $this->handlers[] = $handler;
    }

    public function notifyHandler() {
        foreach ($this->handlers as $handler) {
            $handler->handle($this->eventData);
        }
    }
}

class FooEventHandler {
    public function handle(string $eventData) {
        echo $eventData, PHP_EOL;
    }
}

$fooHandler = new FooEventHandler();
$event = new FooEvent('I am FooEvent');
$event->registerHandlers($fooHandler);
$event->notifyHandler(); // I am FooEvent
