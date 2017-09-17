<?php

namespace Structural\Bridge;

class HtmlView implements View
{
    private $resource;

    public function __construct(Resource $resource)
    {
        $this->resource = $resource;
    }

    public function render(): string
    {
        $contents = [
            "<p>Title\t: {$this->resource->title()}</p>",
            "<p><img src=\"{$this->resource->image()}\"></p>",
            "<p>Description\t: {$this->resource->description()}</p>",
        ];

        return implode(PHP_EOL, $contents) . PHP_EOL;
    }
}