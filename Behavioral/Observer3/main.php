<?php

class EventDispatcher {
    private static $pair = [];

    public static function registerPair(string $eventName, $handler) {
        self::$pair[$eventName][] = $handler;
    }

    public static function fire(Event $event) {
        $eventName = get_class($event);
        if (array_key_exists($eventName, self::$pair) === false) {
            return;
        }

        foreach (self::$pair[$eventName] as $typeUnknownHandler) {
            if (is_string($typeUnknownHandler)) {
                $handler = new $typeUnknownHandler();
                $handler->handle($event);
            }
            if ($typeUnknownHandler instanceof Closure) {
                $typeUnknownHandler($event);
            }
            if ($typeUnknownHandler instanceof Handler) {
                $typeUnknownHandler->handle($event);
            }
        }
    }
}

interface Event {}

class FooEvent implements Event {
    private $data;

    public function __construct(array $data) {
        $this->data = $data;
    }

    public function getData() {
        return $this->data;
    }
}

interface Handler {
    public function handle(Event $event);
}

class MaskFirstLetterEventHandler implements Handler {
    public function handle(Event $event) {
        $result = array_map(function ($elem) {
            $remainder = mb_substr($elem, 1);
            return "*{$remainder}";
        }, $event->getData());
        echo implode(' ', $result), PHP_EOL;
    }
}

EventDispatcher::registerPair(FooEvent::class, function (Event $event) {
    echo implode(' ', $event->getData()), PHP_EOL;
});
EventDispatcher::registerPair(FooEvent::class, MaskFirstLetterEventHandler::class);

$fooEvent = new FooEvent(['I', 'am', 'FooEvent']);
EventDispatcher::fire($fooEvent);
// I am FooEvent
// * *m *ooEvent
