<?php

namespace Basic\DI\Transcoder;

interface Transcoder
{
    public function transcode(string $source, Output $output): void;
}