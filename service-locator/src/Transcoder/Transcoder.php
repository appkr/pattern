<?php

namespace App\Transcoder;

interface Transcoder
{
    public function transcode(string $source, Output $output): void;
}