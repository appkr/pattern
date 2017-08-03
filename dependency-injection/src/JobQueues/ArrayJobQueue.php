<?php

namespace App\JobQueues;

use App\Presenters\NullPresenter;
use App\Transcoder\JobData;
use App\Transcoder\JobQueue;

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