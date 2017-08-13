<?php

namespace App\Ex1;

class FullService implements Service
{
    public function __construct()
    {
        echo '클래스 인스턴스를 생성합니다. '
            , "이 클래스는 일반 고객과 프리미엄 고객을 위한\n\t 서비스를 구분하여 제공하고 있습니다: "
            , __CLASS__, PHP_EOL;
    }

    public function request(): void
    {
        echo '일반 고객과 프리미엄 고객 모두를 위한 서비스입니다: ', __METHOD__, PHP_EOL;
    }

    public function specialRequest(): void
    {
        echo '프리미엄 고객만을 위한 서비스입니다: ', __METHOD__, PHP_EOL;
    }
}