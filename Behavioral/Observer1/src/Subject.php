<?php

namespace Behavioral\Observer1;

interface Subject
{
    public function attach($observable);
    public function detach($observer);
    public function notify();
}
