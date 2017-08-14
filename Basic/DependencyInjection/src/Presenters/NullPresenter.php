<?php

namespace Basic\DI\Presenters;

use Basic\DI\Transcoder\Output;

class NullPresenter implements Output
{
    public function flush(string $content): void
    {

    }
}