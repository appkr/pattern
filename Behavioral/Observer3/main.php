<?php

class EventDispatcher {
    private static $pair = [];

    public static function registerPair(string $eventName, string $handlerName) {
        self::$pair[$eventName][] = $handlerName;
    }

    public static function fire(Event $event) {
        $eventName = get_class($event);
        if (array_key_exists($eventName, self::$pair) === false) {
            return;
        }

        foreach (self::$pair[$eventName] as $handlerName) {
            $handler = new $handlerName();
            $handler->handle($event);
            // 아래와 같이 호출해도 됩니다.
            // call_user_func([new $handlerName, 'handle'], $event);
            // call_user_func_array([new $handlerName, 'handle'], [$event]);
        }
    }
}

interface Event {}

class FooEvent implements Event {
    private $fooData;

    public function __construct(array $fooData) {
        $this->fooData = $fooData;
    }

    public function getFooData() {
        return $this->fooData;
    }
}

class BarEvent implements Event {
    private $barData;

    public function __construct(string $barData) {
        $this->barData = $barData;
    }

    public function getBarData() {
        return $this->barData;
    }
}

interface Handler {
    public function handle(Event $event);
}

class PrintArrayEventHandler implements Handler {
    public function handle(Event $event) {
        /** @var FooEvent $event */
        echo implode(' ', $event->getFooData()), PHP_EOL;
    }
}

class AllCapsStringEventHandler implements Handler {
    public function handle(Event $event) {
        /** @var BarEvent $event */
        echo strtoupper($event->getBarData()), PHP_EOL;
    }
}

EventDispatcher::registerPair(FooEvent::class, PrintArrayEventHandler::class);
EventDispatcher::registerPair(BarEvent::class, AllCapsStringEventHandler::class);

$fooEvent = new FooEvent(['I', 'am', 'Foo']);
EventDispatcher::fire($fooEvent);

$barEvent = new BarEvent('I am Bar');
EventDispatcher::fire($barEvent);
