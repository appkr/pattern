<?php

namespace Creational\Builder;

class Address
{
    private $siDo;
    private $siGunGu;
    private $legalDong;
    private $legalRi;
    private $legalCode;
    private $adminDong;
    private $adminCode;
    private $jibun;
    private $detail;

    public static function createFromJson(string $json)
    {
        $decoded = json_decode($json);

        $instance = new static();
        $instance->siDo = $decoded->siDo ?? null;
        $instance->siGunGu = $decoded->siGunGu ?? null;
        $instance->legalDong = $decoded->legalDong ?? null;
        $instance->legalRi = $decoded->legalRi ?? null;
        $instance->legalCode = $decoded->legalCode ?? null;
        $instance->adminDong = $decoded->adminDong ?? null;
        $instance->adminCode = $decoded->adminCode ?? null;
        $instance->jibun = $decoded->jibun ?? null;
        $instance->detail = $decoded->detail ?? null;

        return $instance;
    }

    public static function createFromBuilder(AddressBuilder $b)
    {
        $a = new static();
        $a->siDo = $b->getSiDo();
        $a->siGunGu = $b->getSiGunGu();
        $a->legalDong = $b->getLegalDong();
        $a->legalRi = $b->getLegalRi();
        $a->legalCode = $b->getLegalCode();
        $a->adminDong = $b->getAdminDong();
        $a->adminCode = $b->getAdminCode();
        $a->jibun = $b->getJibun();
        $a->detail = $b->getDetail();

        return $a;
    }

    public static function builder()
    {
        return new AddressBuilder();
    }

    public function getSiDo()
    {
        return $this->siDo;
    }

    public function getSiGunGu()
    {
        return $this->siGunGu;
    }

    public function getLegalDong()
    {
        return $this->legalDong;
    }

    public function getLegalRi()
    {
        return $this->legalRi;
    }

    public function getLegalCode()
    {
        return $this->legalCode;
    }

    public function getAdminDong()
    {
        return $this->adminDong;
    }

    public function getAdminCode()
    {
        return $this->adminCode;
    }

    public function getJibun()
    {
        return $this->jibun;
    }

    public function getDetail()
    {
        return $this->detail;
    }
}
