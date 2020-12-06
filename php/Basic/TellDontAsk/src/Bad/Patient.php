<?php

namespace Basic\TellDontAsk\Bad;

use Basic\TellDontAsk\Doctor;
use Basic\TellDontAsk\HospitalVisitor;

class Patient implements HospitalVisitor
{
    private $id;
    private $isHealthy = false;

    public function __construct()
    {
        $this->id = uniqid();
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setHealthiness(bool $state): void
    {
        $this->isHealthy = $state;
    }

    public function getHealthiness(): string
    {
        return $this->isHealthy ? '양호' : '불량';
    }

    public function visitDoctor(Doctor $doctor): string
    {
        return $doctor->examinePatient($this);
    }

    public function requestMedicalTreatment(Doctor $doctor): void
    {
        if (false === $doctor->isMyOrganOk($this)) {
            $doctor->doSurgery($this);
        }
    }
}