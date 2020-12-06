<?php

namespace Creational\Builder;

use PHPUnit\Framework\TestCase;

class AddressBuilderTest extends TestCase
{
    public function testCanBuildAddress()
    {
        $sut = Address::builder()
            ->setSiDo("서울특별시")
            ->setSiGunGu("강남구")
            ->build();
        var_dump($sut);
        $this->assertTrue($sut instanceof Address);
    }
}
