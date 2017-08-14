<?php

namespace Basic\DI\Transcoder;

class JobData
{
    private $source;
    private $target;

    public function __construct(string $source, Output $target)
    {
        $this->source = $source;
        $this->target = $target;
    }

    public function getSource(): string
    {
        return $this->source;
    }

    public function getTarget(): Output
    {
        return $this->target;
    }
}