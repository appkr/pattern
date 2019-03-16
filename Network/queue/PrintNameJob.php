<?php

class PrintNameJob implements Job
{
    public $name = "FooBar";

    public function handle() {
        echo $this->name, PHP_EOL;
    }
}
