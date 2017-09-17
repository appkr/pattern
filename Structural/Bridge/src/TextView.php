<?php

namespace Structural\Bridge;

class TextView implements View
{
    private $resource;

    public function __construct(Resource $resource)
    {
        $this->resource = $resource;
    }

    public function render(): string
    {
        $contents = [
            "Title\t: {$this->resource->title()}",
            "Description\t: {$this->resource->description()}",
        ];

        return implode(PHP_EOL, $contents) . PHP_EOL;
    }
}