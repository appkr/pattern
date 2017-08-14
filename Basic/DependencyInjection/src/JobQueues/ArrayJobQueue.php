<?php

namespace Basic\DI\JobQueues;

use Basic\DI\Presenters\NullPresenter;
use Basic\DI\Transcoder\JobData;
use Basic\DI\Transcoder\JobQueue;

class ArrayJobQueue implements JobQueue
{
    private $jobs;

    public function __construct()
    {
        $this->jobs = [];
    }

    public function addJob(JobData $jobData): void
    {
        $this->jobs[] = $jobData;
    }

    public function getJob(): JobData
    {
        return array_shift($this->jobs)
            ?: new JobData('', new NullPresenter());
    }
}