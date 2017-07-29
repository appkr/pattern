<?php

namespace App\Transcoders;

use App\Transcoder\Output;
use App\Transcoder\Transcoder;

class RandomTranscoder implements Transcoder
{
    public function transcode(string $source, Output $output): void
    {
        // 시간이 오래 걸리는 작업을 시뮬레이션 합니다.
        // sleep(3);
        $transformed = str_shuffle($source);
        $output->flush($transformed);
    }
}