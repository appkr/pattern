<?php

namespace Structural\Proxy\Ex1;

class PublicService implements Service
{
    public function request(): void
    {
        echo 'FullService 에게 작업을 위임합니다: ', __METHOD__, PHP_EOL;
        $realService = new FullService();
        $realService->request();
    }
}