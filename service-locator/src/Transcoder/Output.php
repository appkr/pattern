<?php

namespace App\Transcoder;

interface Output
{
    public function flush(string $content): void;
}