<?php

require_once __DIR__.'/./Queue.php';
require_once __DIR__.'/./Job.php';
require_once __DIR__.'/./PrintNameJob.php';
require_once __DIR__.'/./JobDispatcher.php';

$queue = new Queue();

while(true) {
    $job = $queue->pop();
    if ($job) {
        $job->handle();
    }
    sleep(1);
}
