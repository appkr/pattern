<?php

namespace Basic\ServiceLocator\Transcoder;

interface JobQueue
{
    public function addJob(JobData $jobData): void;
    public function getJob(): JobData;
}