<?php

namespace Basic\TellDontAsk;

interface Doctor
{
    public function examinePatient(HospitalVisitor $patient): string;
    public function doSurgery(HospitalVisitor $patient): void;
}