<?php

namespace Basic\ServiceLocator\Transcoder;

interface Transcoder
{
    public function transcode(string $source, Output $output): void;
}