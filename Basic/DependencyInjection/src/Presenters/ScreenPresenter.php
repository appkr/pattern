<?php

namespace Basic\DI\Presenters;

use Basic\DI\Transcoder\Output;

class ScreenPresenter implements Output
{
    public function flush(string $content): void
    {
        echo '=> ' . $content;
        echo PHP_EOL;
        echo PHP_EOL;
    }
}