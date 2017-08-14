<?php

namespace Behavioral\Command\Test;

use Behavioral\Command\FlipDownCommand;
use Behavioral\Command\FlipUpCommand;
use Behavioral\Command\Light;
use Behavioral\Command\SwitchController;
use PHPUnit\Framework\TestCase;

/**
 * The Client Class
 */
final class SwitchControllerTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
        echo PHP_EOL;
    }

    public function testCanTurnOnLight()
    {
        $light = new Light;
        $switchUp = new FlipUpCommand($light);
        $mySwitch = new SwitchController;

        $mySwitch->storeAndExecute($switchUp);

        $this->assertTrue($mySwitch->getHistory()->first() === $switchUp);
    }

    public function testCanTurnOffLight()
    {
        $light = new Light;
        $switchDown = new FlipDownCommand($light);
        $mySwitch = new SwitchController;

        $mySwitch->storeAndExecute($switchDown);

        $this->assertTrue($mySwitch->getHistory()->first() === $switchDown);
    }
}