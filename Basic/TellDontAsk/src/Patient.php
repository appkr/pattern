<?php

namespace Basic\TellDontAsk;

class Patient
{
    private $id;
    private $isHealthy = false;

    public function __construct()
    {
        $this->id = uniqid();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setHealthiness(bool $state)
    {
        $this->isHealthy = $state;
    }

    public function getHealthiness()
    {
        return $this->isHealthy ? '양호' : '불량';
    }

    public function visitDoctor(Doctor $doctor)
    {
        return $doctor->examinePatient($this);
    }
}