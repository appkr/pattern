<?php

namespace Behavioral\Command2;

/**
 * The Command Interface
 */
interface Command
{
    public function execute(): void;
    public function unexecute(): void;
}