<?php

namespace App\Transcoder;

class Worker
{
    public function run()
    {
        // Locator를 이용한 구현
        $jobQueue = Locator::getInstance()->getJobQueue();
        $transcoder = Locator::getInstance()->getTranscoder();

        while (true) {
            $jobData = $jobQueue->getJob();
            $transcoder->transcode(
                $jobData->getSource(), $jobData->getTarget()
            );
            usleep(1);
        }
    }
}