<?php

namespace App\Ui;

use App\Presenters\FilePresenter;
use App\Presenters\ScreenPresenter;
use App\Transcoder\JobData;
use App\Transcoder\Locator;
use App\Transcoder\Output;

class JobCli
{
    private $output;

    public function interact(): void
    {
        $source = $this->askSource();
        $target = $this->askTarget();

        $jobData = new JobData($source, $target);

        // Locator를 이용한 구현
        $jobQueue = Locator::getInstance()->getJobQueue();
        $transcoder = Locator::getInstance()->getTranscoder();

        $jobQueue->addJob($jobData);

        while (true) {
            $jobData = $jobQueue->getJob();
            $transcoder->transcode(
                $jobData->getSource(), $jobData->getTarget()
            );
            usleep(1);

            $this->interact();
        }
    }

    private function askSource(
        string $message = '트랜스코딩하려는 문자열을 입력해 주세요.'
    ): string {
        $source = readline($message . PHP_EOL);
        readline_add_history($source);

        if (mb_strlen(trim($source)) === 0) {
            return $this->askSource('한 글자 이상의 문자열을 입력해 주세요.');
        }

        return $source;
    }

    private function askTarget(
        string $message = '결과를 저장할 파일명을 입력하세요. 화면에 출력하려면 엔터를 누르세요.'
    ): Output {
        if (null !== $this->output) {
            return $this->output;
        }

        $target = readline($message . PHP_EOL);
        readline_add_history($target);

        $output = null;
        if (mb_strlen(trim($target)) === 0) {
            $output = new ScreenPresenter();
        } else {
            $output = new FilePresenter($target);
        }

        return $this->output = $output;
    }
}