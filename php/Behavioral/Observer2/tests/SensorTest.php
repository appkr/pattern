<?php

namespace Behavioral\Observer2;

use PHPUnit\Framework\TestCase;

class SensorTest extends TestCase
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
    public function observable_can_send_messages_to_observers()
    {
        $temperatureSensor = new TemperatureSensor;
        $temperatureSensor->add(new ScreenDisplay);
        $temperatureSensor->add(new LogWriter('log.txt'));

        $humiditySensor = new HumiditySensor;
        $humiditySensor->add(new ScreenDisplay);
        $humiditySensor->add(new LogWriter('log.txt'));

        $temperatureSensor->setState(10);
        $temperatureSensor->notify();

        $humiditySensor->setState(20);
        $humiditySensor->notify();

        $this->assertTrue(true);
    }
}