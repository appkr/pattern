<?php

namespace Creational\Singleton;

use PHPUnit\Framework\TestCase;

class ConfigTest extends TestCase
{
    public function testCanReadConfigFromSingletonConfig()
    {
        $config = SingletonConfig::getInstance();
        $this->assertTrue($config->get("foo") == "bar");
    }
}