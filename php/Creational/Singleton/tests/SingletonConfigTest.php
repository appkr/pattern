<?php

namespace Creational\Singleton;

use PHPUnit\Framework\TestCase;

class SingletonConfigTest extends TestCase
{
    public function testCanCreateSingletonInstance()
    {
        $sut1 = SingletonConfig::getInstance();
        $sut2 = SingletonConfig::getInstance();
        $this->assertTrue(spl_object_hash($sut1) == spl_object_hash($sut2));
    }

    public function testShouldNotInheritSingletonInstance()
    {
        $this->markTestSkipped();
        $this->expectException(\Throwable::class);
        $sut = new class extends SingletonConfig {};
    }

    public function testShouldNotCloneSingletonInstance()
    {
        $this->expectException(\Throwable::class);
        $sut1 = SingletonConfig::getInstance();
        $sut2 = clone $sut1;
        var_dump(spl_object_hash($sut1), spl_object_hash($sut2));
    }

    public function testShouldNotCreateNewInstanceFromDeserialization()
    {
        $this->expectException(\PHPUnit\Framework\Error\Warning::class);
        $sut1 = SingletonConfig::getInstance();
        $sut2 = unserialize(serialize($sut1));
    }

    public function testShouldNotCreateNewInstanceFromReflection()
    {
        $this->markTestIncomplete();
        $sut1 = SingletonConfig::getInstance();
        $sut2 = (new \ReflectionClass(SingletonConfig::class))
            ->newInstanceWithoutConstructor();
        var_dump(spl_object_hash($sut1), spl_object_hash($sut2));
    }
}