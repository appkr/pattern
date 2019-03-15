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

class UserRegisteredEvent implements Event {
    public $user;
    public function __construct($user) {
        $this->user = $user;
    }
}

interface Handler {
    public function handle(Event $event);
}

class SendWelcomeEmail implements Handler {
    public function handle(Event $event) {
        echo "Send mail to {$event->user->name}", PHP_EOL;
    }
}

class User {
    public $name;
    public function __construct($name) {
        $this->name = $name;
    }
}

EventDispatcher::registerPair(UserRegisteredEvent::class, SendWelcomeEmail::class);

$user = new User('FooBar');
$event = new UserRegisteredEvent($user);
EventDispatcher::fire($event); // Send mail to FooBar
