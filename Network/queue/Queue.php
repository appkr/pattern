<?php

class Queue {
    private $storage = __DIR__.'/./queue.txt';

    public function __construct(){
        $this->storage = sys_get_temp_dir() . '/queue.txt';

        if (! file_exists($this->storage)) {
            file_put_contents($this->storage, '', LOCK_EX);
        }
    }

    public function push($message){
        file_put_contents($this->storage, $message.PHP_EOL, FILE_APPEND|LOCK_EX);
    }

    public function pop() {
        $messages = file($this->storage, FILE_SKIP_EMPTY_LINES);
        if (count($messages) > 0) {
            $message = array_shift($messages);
            file_put_contents($this->storage, implode(PHP_EOL, $messages), LOCK_EX);
            return $message;
        }
    }
}
