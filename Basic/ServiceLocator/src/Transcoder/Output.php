<?php

namespace Basic\ServiceLocator\Transcoder;

interface Output
{
    public function flush(string $content): void;
}