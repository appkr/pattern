<?php

namespace App\Presenters;

use App\Transcoder\Output;

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
            $this->path, $content . PHP_EOL, FILE_APPEND
        );
    }
}