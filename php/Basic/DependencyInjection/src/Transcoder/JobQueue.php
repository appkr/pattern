<?php

namespace Basic\DI\Transcoder;

interface JobQueue
{
    public function addJob(JobData $jobData): void;
    public function getJob(): JobData;
}