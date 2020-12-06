<?php

namespace Basic\DI\Transcoder;

class JobWorker
{
    private $jobQueue;
    private $transcoder;

    public function __construct(JobQueue $jobQueue, Transcoder $transcoder)
    {
        $this->jobQueue = $jobQueue;
        $this->transcoder = $transcoder;
    }

    public function run()
    {
        while (true) {
            $jobData = $this->jobQueue->getJob();

            $this->transcoder->transcode(
                $jobData->getSource(), $jobData->getTarget()
            );

            sleep(1);
        }
    }
}