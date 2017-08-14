<?php

namespace Structural\Proxy\Test\Ex1;

use Structural\Proxy\Ex1\FullService;
use Structural\Proxy\Ex1\PublicService;
use PHPUnit\Framework\TestCase;

class ServiceTest extends TestCase
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
    public function public_customer_can_request_public_service()
    {
        // FullService 또는 PublicService 를 선택해서 생성하는 로직은 다른 곳에 있다고 가정합니다.
        $proxy = new PublicService();
        $proxy->request();
        $this->assertInstanceOf(PublicService::class, $proxy);
    }

    /** @test */
    public function premium_customer_can_request_both_public_and_premium_service()
    {
        // FullService 또는 PublicService 를 선택해서 생성하는 로직은 다른 곳에 있다고 가정합니다.
        $real = new FullService();
        $real->request();
        $real->specialRequest();
        $this->assertInstanceOf(FullService::class, $real);
    }
}
