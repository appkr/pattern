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
