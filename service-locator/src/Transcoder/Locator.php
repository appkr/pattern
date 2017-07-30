<?php

namespace App\Transcoder;

class Locator
{
    private $jobQueue;
    private $transcoder;
    private static $instance;

    public function getJobQueue(): JobQueue
    {
        return $this->jobQueue;
    }

    public function getTranscoder(): Transcoder
    {
        return $this->transcoder;
    }

    public static function init(
        JobQueue $jobQueue, Transcoder $transcoder
    ): void {
        static::$instance = new static($jobQueue, $transcoder);
    }

    public static function getInstance(): Locator
    {
        if (null === static::$instance) {
            throw new \Exception('Locator가 초기화되지 않았습니다.');
        }

        return static::$instance;
    }

    private function __construct(JobQueue $jobQueue, Transcoder $transcoder)
    {
        $this->jobQueue = $jobQueue;
        $this->transcoder = $transcoder;
    }

    private function __clone()
    {
    }

    private function __wakeup()
    {
    }
}