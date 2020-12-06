<?php

namespace Basic\ServiceLocator\Presenters;

use Basic\ServiceLocator\Transcoder\Output;

class ScreenPresenter implements Output
{
    public function flush(string $content): void
    {
        echo '=> ' . $content;
        echo PHP_EOL;
        echo PHP_EOL;
    }
}