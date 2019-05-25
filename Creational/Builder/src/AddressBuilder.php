<?php

namespace Creational\Builder;

class AddressBuilder
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

    public function build()
    {
        return Address::createFromBuilder($this);
    }

    public function getSiDo()
    {
        return $this->siDo;
    }

    public function setSiDo($siDo)
    {
        $this->siDo = $siDo;
        return $this;
    }

    public function getSiGunGu()
    {
        return $this->siGunGu;
    }

    public function setSiGunGu($siGunGu)
    {
        $this->siGunGu = $siGunGu;
        return $this;
    }

    public function getLegalDong()
    {
        return $this->legalDong;
    }

    public function setLegalDong($legalDong)
    {
        $this->legalDong = $legalDong;
        return $this;
    }

    public function getLegalRi()
    {
        return $this->legalRi;
    }

    public function setLegalRi($legalRi)
    {
        $this->legalRi = $legalRi;
        return $this;
    }

    public function getLegalCode()
    {
        return $this->legalCode;
    }

    public function setLegalCode($legalCode)
    {
        $this->legalCode = $legalCode;
        return $this;
    }

    public function getAdminDong()
    {
        return $this->adminDong;
    }

    public function setAdminDong($adminDong)
    {
        $this->adminDong = $adminDong;
        return $this;
    }

    public function getAdminCode()
    {
        return $this->adminCode;
    }

    public function setAdminCode($adminCode)
    {
        $this->adminCode = $adminCode;
        return $this;
    }

    public function getJibun()
    {
        return $this->jibun;
    }

    public function setJibun($jibun)
    {
        $this->jibun = $jibun;
        return $this;
    }

    public function getDetail()
    {
        return $this->detail;
    }

    public function setDetail($detail)
    {
        $this->detail = $detail;
        return $this;
    }
}
