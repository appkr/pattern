<?php

namespace App\Presenters;

use App\Transcoder\Output;

class NullPresenter implements Output
{
    public function flush(string $content): void
    {

    }
}