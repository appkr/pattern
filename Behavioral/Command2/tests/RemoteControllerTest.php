<?php

namespace Behavioral\Command2\Test;

use Behavioral\Command2\Light;
use Behavioral\Command2\RemoteController;
use Behavioral\Command2\TurnLightOff;
use Behavioral\Command2\TurnLightOn;
use Behavioral\Command2\TurnLightsOn;
use PHPUnit\Framework\TestCase;

final class RemoteControllerTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
        echo PHP_EOL;
    }

    public function tearDown()
    {
        echo str_repeat('-', 80), PHP_EOL;
        parent::tearDown();
    }

    /** @test */
    public function remote_can_turn_on_light()
    {
        echo __METHOD__, PHP_EOL;

        $light = new Light;
        $turnOnCommand = new TurnLightOn($light);
        $remoteController = new RemoteController();

        $remoteController->do($turnOnCommand);

        $this->assertTrue($light->getStatus() === $light::STATUS_ON);
    }

    /** @test */
    public function remote_can_turn_off_light()
    {
        echo __METHOD__, PHP_EOL;

        $light = new Light;
        $turnOffCommand = new TurnLightOff($light);
        $remoteController = new RemoteController();

        $remoteController->do($turnOffCommand);

        $this->assertTrue($light->getStatus() === $light::STATUS_OFF);
    }

    /** @test */
    public function remote_can_turn_on_multiple_lights()
    {
        echo __METHOD__, PHP_EOL;

        $lightsOnFirstFloor = [
            new Light,
            new Light,
        ];
        $turnAllLightsOnFirstFloorCommand = new TurnLightsOn($lightsOnFirstFloor);
        $remoteController = new RemoteController();

        $remoteController->do($turnAllLightsOnFirstFloorCommand);

        foreach ($lightsOnFirstFloor as $light) {
            $this->assertTrue($light->getStatus() === $light::STATUS_ON);
        }
    }

    /** @test */
    public function remote_can_undo_previous_command()
    {
        echo __METHOD__, PHP_EOL;

        $light = new Light;
        $turnOnCommand = new TurnLightOn($light);
        $remoteController = new RemoteController();

        $remoteController->do($turnOnCommand);
        $remoteController->undo($turnOnCommand);

        $this->assertTrue($light->getStatus() === $light::STATUS_OFF);
    }

    /** @test */
    public function remote_holds_command_histories()
    {
        echo __METHOD__, PHP_EOL;

        $light = new Light;
        $turnOnCommand = new TurnLightOn($light);
        $turnOffCommand = new TurnLightOff($light);
        $remoteController = new RemoteController();

        $remoteController->do($turnOnCommand);
        $remoteController->do($turnOffCommand);

        $this->assertCount(2, $remoteController->getHistory());
    }
}