<?php

require __DIR__.'/./Queue.php';
require __DIR__.'/../../Behavioral/Observer3/Event.php';
require __DIR__.'/../../Behavioral/Observer3/Handler.php';
require __DIR__.'/../../Behavioral/Observer3/EventDispatcher.php';

$queue = new Queue();

class ADomainEvent implements Event {
    public $data = 'I am a domain event. Somebody handle me!';
}

class AEventHandler implements Handler {
    private $queue;
    public function __construct(Queue $queue) {
        $this->queue = $queue;
    }
    public function handle(Event $event) {
        $this->queue->push($event->data);
    }
}

$event = new ADomainEvent();
$handler = new AEventHandler($queue);
EventDispatcher::registerPair(ADomainEvent::class, $handler);
EventDispatcher::fire($event);
