<?php

namespace Basic\TellDontAsk;

interface Doctor
{
    public function examinePatient(Patient $patient): string;
}