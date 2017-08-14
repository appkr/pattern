<?php

namespace Structural\Proxy\Test\Ex2;

use Structural\Proxy\Ex2\User;
use Structural\Proxy\Ex2\UserProxy;
use PHPUnit\Framework\TestCase;

/**
 * @property string userId
 * @property User user
 */
class UserTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();

        echo PHP_EOL;
        echo '테스트에 필요한 데이터를 만듭니다.', PHP_EOL;

        $this->userId = $id = uniqid();
        $this->user = new User($id, 'Foo', 'foo@example.com');
        $this->user->save();

        echo '새 User 객체를 생성하고 저장했습니다: ', __METHOD__, PHP_EOL;
        echo str_repeat('-', 80), PHP_EOL;
    }

    public function tearDown()
    {
        echo str_repeat('-', 80), PHP_EOL;
        parent::tearDown();
    }

    /** @test */
    public function user_object_can_be_loaded_lazily()
    {
        $proxy = new UserProxy($this->userId);
        $this->assertNull($proxy->getRealUser());

        $proxy->somePublicApi();
        $this->assertInstanceOf(User::class, $proxy->getRealUser());
    }
}
