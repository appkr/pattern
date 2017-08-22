<?php

namespace Basic\TellDontAsk;

interface HospitalVisitor
{
    public function getId(): string;
    public function setHealthiness(bool $state): void;
    public function getHealthiness(): string;
    public function visitDoctor(Doctor $doctor): string;
    public function requestMedicalTreatment(Doctor $doctor): void;
}