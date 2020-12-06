<?php

namespace Behavioral\Command2;

/**
 * The Invoker.
 *
 * Class RemoteController
 * @package Behavioral\Command2
 */
class RemoteController
{
    private $history;

    public function do(Command $cmd)
    {
        $key = spl_object_hash($cmd);
        $this->history[$key] = $cmd;
        $cmd->execute();
    }

    public function undo(Command $cmd)
    {
        $key = spl_object_hash($cmd);

        if (array_key_exists($key, $this->history)) {
            $cmd->unexecute();
            unset($this->history[$key]);
        }
    }

    public function getHistory()
    {
        return $this->history;
    }
}