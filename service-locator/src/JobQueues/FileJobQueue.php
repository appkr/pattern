<?php

namespace App\JobQueues;

use App\Transcoder\JobData;
use App\Transcoder\JobQueue;

class FileJobQueue implements JobQueue
{
    private $path;

    public function __construct()
    {
        $this->path = sys_get_temp_dir() . '/jobs.txt';
    }

    public function addJob(JobData $jobData): void
    {
        file_put_contents($this->path, serialize($jobData), FILE_APPEND);
    }

    public function getJob(): JobData
    {
        $jobs = file($this->path, FILE_SKIP_EMPTY_LINES);
        $job = array_shift($jobs);
        file_put_contents($this->path, implode(PHP_EOL, $jobs));

        return unserialize($job);
    }
}