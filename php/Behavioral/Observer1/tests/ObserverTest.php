<?php

namespace Behavioral\Observer1;

use PHPUnit\Framework\TestCase;

class ObserverTest extends TestCase
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
        $login = new Login;
        $login->attach([
            new LogHandler,
            new EmailNotifier,
        ]);
        $login->notify();

        $this->assertTrue(true);
    }
}