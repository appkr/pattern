<?php

namespace Behavioral\Command2;

/**
 * The Receiver.
 */
class Light
{
    const STATUS_ON = 'ON';
    const STATUS_OFF = 'OFF';

    private $id;
    private $status;

    public function __construct()
    {
        $this->id = spl_object_hash($this);
    }

    public function on()
    {
        $this->status = self::STATUS_ON;
        echo "The light {$this->id} is {$this->status}.", PHP_EOL;
    }

    public function off()
    {
        $this->status = self::STATUS_OFF;
        echo "The light {$this->id} is {$this->status}.", PHP_EOL;
    }

    public function getStatus()
    {
        return ($this->status === self::STATUS_ON)
            ? self::STATUS_ON : self::STATUS_OFF;
    }
}