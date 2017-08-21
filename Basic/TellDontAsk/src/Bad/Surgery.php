<?php

namespace Basic\TellDontAsk\Bad;

use Basic\TellDontAsk\Doctor;
use Basic\TellDontAsk\Patient;
use Exception;

class Surgery implements Doctor
{
    private $medicalChart = [];

    public function examinePatient(Patient $patient): string
    {
        // 예제에서는 하드 코드를 썼지만,
        // 런타임에 다른 클래스나 메서드에 판단을 위임하여 동적으로 값을 얻어올 겁니다.
        $diagnosis = 'Colon Cancer';

        $this->medicalChart[$patient->getId()] = [
            'healthiness' => false,
            'diagnosis' => $diagnosis,
        ];

        return $diagnosis;
    }

    public function isMyOrganOk(Patient $patient)
    {
        $patientId = $patient->getId();

        if (array_key_exists($patientId, $this->medicalChart)) {
            return $this->medicalChart[$patientId]['healthiness'];
        }

        throw new Exception("차트에 없는 환자입니다: {$patientId}");
    }

    public function doSurgery(Patient $patient)
    {
        $patientId = $patient->getId();

        if (! array_key_exists($patientId, $this->medicalChart)) {
            throw new Exception("차트에 없는 환자입니다: {$patientId}");
        }

        $this->performIncision();
        $this->removeACancer();
        $this->performSuture();

        $this->medicalChart[$patientId] = [
            'healthiness' => true,
            'diagnosis' => null,
        ];

        $patient->setHealthiness(true);
    }

    private function performIncision()
    {
        echo '의사가 환자의 배를 절개합니다.', PHP_EOL;
    }

    private function removeACancer()
    {
        echo '의사가 환자의 암을 제거합니다.', PHP_EOL;
    }

    private function performSuture()
    {
        echo '의사가 환자의 배를 봉합합니다.', PHP_EOL;
    }
}