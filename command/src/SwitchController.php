<?php

namespace App;

use Illuminate\Support\Collection;

/**
 * The Invoker(Caller) Class
 */
class SwitchController
{
    private $history;

    public function __construct()
    {
        $this->history = new Collection;
    }

    public function storeAndExecute(Command $cmd)
    {
        $this->history->push($cmd);
        $cmd->execute();
    }

    public function getHistory()
    {
        return $this->history;
    }
}