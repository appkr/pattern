<?php

namespace Structural\Proxy\Ex2;

class UserProxy implements Model
{
    private $id;
    private $realUser;

    public function __construct(string $id)
    {
        $this->id = $id;
        echo '프록시 객체가 생성되었습니다:', __METHOD__, PHP_EOL;
        echo "User 객체는 아직 생성되지 않았지만, Model 인터페이스를 구현하고 있으므로 \n\t코드 작동에 문제가 없습니다.:", __METHOD__, PHP_EOL;
    }

    public function somePublicApi(): void
    {
        if (is_null($this->realUser)) {
            // 구현하다 보니 싱글톤 느낌이...
            $instance = new User();
            $this->realUser = $instance->load($this->id);
        }

        echo '요청 처리를 위임합니다: ', __METHOD__, PHP_EOL;

        $this->realUser->somePublicApi();
    }

    public function getRealUser()
    {
        return $this->realUser;
    }
}