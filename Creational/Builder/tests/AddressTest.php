<?php

namespace Creational\Builder;

class AddressTest extends \PHPUnit\Framework\TestCase
{
    public function testCanInstantiateAddress()
    {
        $json =<<<JSON
{
    "siDo": "서울특별시",
    "siGunGu": "강남구",
    "legalDong": "삼성동",
    "legalRi": "",
    "legalCode": "1234567890",
    "adminDong": "삼성1동",
    "adminCode": "1234567890",
    "jibun": "162-17",
    "detail": "익성빌딩 5층"
}
JSON;
        $sut = Address::createFromJson($json);
        var_dump($sut);
        $this->assertTrue($sut instanceof Address);
    }
}
