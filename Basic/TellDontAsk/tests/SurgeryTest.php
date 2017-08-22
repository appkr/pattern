<?php

namespace Basic\TellDontAsk\Test;

use Basic\TellDontAsk\Bad\Surgery as BadDoctor;
use Basic\TellDontAsk\Surgery as GoodDoctor;
use Basic\TellDontAsk\Bad\Patient as BadPatient;
use Basic\TellDontAsk\Patient as GoodPatient;
use PHPUnit\Framework\TestCase;

class SurgeryTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
        echo PHP_EOL;
    }

    public function tearDown()
    {
        echo str_repeat('-', 80), PHP_EOL;
        parent::tearDown();
    }

    /** @test */
    public function a_patient_gets_a_surgery_with_asking()
    {
        $patient = new BadPatient();
        $doctor = new BadDoctor();

        echo __METHOD__, PHP_EOL;
        echo '환자가 병원을 방문해서 진단을 받습니다.', PHP_EOL;
        echo "{$patient->getId()} 환자의 현재 건강상태: {$patient->getHealthiness()}", PHP_EOL;

        $diagnosis = $patient->visitDoctor($doctor);
        echo "{$patient->getId()} 환자의 진단명: {$diagnosis}", PHP_EOL;

        echo '환자가 자신의 대장 상태를 보고 수술 여부를 판단합니다.', PHP_EOL;
        $patient->requestMedicalTreatment($doctor);

        echo "{$patient->getId()} 환자의 현재 건강상태: {$patient->getHealthiness()}", PHP_EOL;

        $this->assertTrue(true);
    }

    /** @test */
    public function a_patient_gets_a_surgery_without_asking()
    {
        $patient = new GoodPatient();
        $doctor = new GoodDoctor();

        echo __METHOD__, PHP_EOL;
        echo '환자가 병원을 방문해서 진단을 받습니다.', PHP_EOL;
        echo "{$patient->getId()} 환자의 현재 건강상태: {$patient->getHealthiness()}", PHP_EOL;

        $diagnosis = $patient->visitDoctor($doctor);
        echo "{$patient->getId()} 환자의 진단명: {$diagnosis}", PHP_EOL;

        echo '환자는 의사에게 수술을 요청하고, 수술 여부는 의사가 판단합니다.', PHP_EOL;
        $patient->requestMedicalTreatment($doctor);

        echo "{$patient->getId()} 환자의 현재 건강상태: {$patient->getHealthiness()}", PHP_EOL;

        $this->assertTrue(true);
    }
}
