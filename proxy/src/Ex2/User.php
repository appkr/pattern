<?php

namespace App\Ex2;

class User implements Model, HasId
{
    private $id;
    private $name;
    private $email;
    private $dao;

    public function __construct(
        string $id = null, string $name = null, string $email = null
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->dao = new DataObject();

        echo 'User 객체가 생성되었습니다:', __METHOD__, PHP_EOL;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function save(): void
    {
        $this->dao->save($this);
    }

    public function load(string $id)
    {
        echo '저장소로부터 User 객체를 재생합니다: ', __METHOD__, PHP_EOL;
        $hydratedUser = $this->dao->find($id);

        if (is_null($hydratedUser)) {
            throw new \Exception('객체를 찾을 수 없습니다.');
        }

        return $hydratedUser;
    }

    public function somePublicApi(): void
    {
        echo '요청을 처리합니다: ', __METHOD__, PHP_EOL;
    }
}