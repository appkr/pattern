<?php

namespace App\JobQueues;

use App\Presenters\NullPresenter;
use App\Transcoder\JobData;
use App\Transcoder\JobQueue;

class FileJobQueue implements JobQueue
{
    private $path;

    public function __construct()
    {
        $this->path = sys_get_temp_dir() . '/jobs.txt';

        if (! file_exists($this->path)) {
            file_put_contents($this->path, '', LOCK_EX);
        }
    }

    public function addJob(JobData $jobData): void
    {
        file_put_contents($this->path, serialize($jobData), FILE_APPEND|LOCK_EX);
    }

    public function getJob(): JobData
    {
        $jobs = file($this->path, FILE_SKIP_EMPTY_LINES);

        if (count($jobs) > 0) {
            $job = array_shift($jobs);
            file_put_contents($this->path, implode(PHP_EOL, $jobs), LOCK_EX);

            return unserialize($job);
        }

        return new JobData('', new NullPresenter());
    }
}