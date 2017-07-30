<?php

namespace App\JobQueues;

use App\Transcoder\JobData;
use App\Transcoder\JobQueue;
use Illuminate\Support\Collection;

class CollectionJobQueue implements JobQueue
{
    private $jobs;

    public function __construct()
    {
        $this->jobs = new Collection([]);
    }

    public function addJob(JobData $jobData): void
    {
        $this->jobs->push($jobData);
    }

    public function getJob(): JobData
    {
        return $this->jobs->shift();
    }
}