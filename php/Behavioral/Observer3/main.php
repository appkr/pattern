<?php

require __DIR__.'/./Event.php';
require __DIR__.'/./EventDispatcher.php';
require __DIR__.'/./Handler.php';

class UserRegisteredEvent implements Event {
    public $user;
    public function __construct($user) {
        $this->user = $user;
    }
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
