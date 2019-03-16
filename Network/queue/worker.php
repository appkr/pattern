<?php

require_once __DIR__.'/./Queue.php';

$queue = new Queue();

while(true) {
    $message = $queue->pop();
    if (mb_strlen($message) > 0) {
        echo $message, PHP_EOL;
    }
    sleep(1);
}
