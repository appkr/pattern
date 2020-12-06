<?php

namespace Basic\DI\Presenters;

use Basic\DI\Transcoder\Output;

class FilePresenter implements Output
{
    private $path;

    public function __construct(string $path)
    {
        $this->path = $path;
    }

    public function flush(string $content): void
    {
        file_put_contents(
            $this->path, $content . PHP_EOL, FILE_APPEND|LOCK_EX
        );
        echo "{$this->path}에 결과를 출력했습니다", PHP_EOL;
    }
}