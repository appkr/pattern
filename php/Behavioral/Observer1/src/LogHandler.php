<?php

namespace Behavioral\Observer1;

class LogHandler implements Observer
{
    public function handle()
    {
        echo 'Log something important.', PHP_EOL;
    }
}