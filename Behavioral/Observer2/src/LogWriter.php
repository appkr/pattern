<?php

namespace Behavioral\Observer2;

class LogWriter implements Observer
{
    use Presentable;

    private $path;

    public function __construct(string $path)
    {
        $this->path = $path;
    }

    public function update(Sensor $sensor): void
    {
        file_put_contents(
            $this->path,
            $this->formatContent($sensor) . PHP_EOL,
            FILE_APPEND|LOCK_EX
        );
    }
}