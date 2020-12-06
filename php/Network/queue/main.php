<?php

require_once __DIR__.'/./Queue.php';
require_once __DIR__.'/./Job.php';
require_once __DIR__.'/./PrintNameJob.php';
require_once __DIR__.'/./JobDispatcher.php';

$job = new PrintNameJob();
JobDispatcher::getInstance()->dispatch($job);
