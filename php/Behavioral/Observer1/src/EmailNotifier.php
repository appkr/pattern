<?php

namespace Behavioral\Observer1;

class EmailNotifier implements Observer
{
    public function handle()
    {
        echo 'Fire off an email', PHP_EOL;
    }
}