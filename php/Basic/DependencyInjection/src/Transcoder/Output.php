<?php

namespace Basic\DI\Transcoder;

interface Output
{
    public function flush(string $content): void;
}