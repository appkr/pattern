<?php

require __DIR__.'/./Queue.php';

$queue = new Queue();

$queue->push('I am message 1');
sleep(1);

$queue->push('I am message 2');
sleep(2);

$queue->push('I am message 3');
