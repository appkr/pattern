<?php

class JobDispatcher {
    private static $INSTANCE;
    private $queue;

    private function __construct(Queue $queue) {
        $this->queue = $queue;
    }

    public static function getInstance() {
        if (self::$INSTANCE == null) {
            $queue = new Queue();
            self::$INSTANCE = new static($queue);
        }
        return self::$INSTANCE;
    }

    public function dispatch(Job $job) {
        $this->queue->push($job);
    }
}
