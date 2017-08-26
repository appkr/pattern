<?php

namespace Basic\LawOfDemeter;

use Exception;
use ReflectionClass;

class AnimalType
{
    const LION = 'LION';
    const TIGER = 'TIGER';
    const ELEPHANT = 'ELEPHANT';

    private static $typeOfAnimals;
    private $animalType;

    private function __construct(string $animalType)
    {
        $this->animalType = $animalType;
    }

    public static function getInstance(string $animalType)
    {
        if (! static::$typeOfAnimals) {
            $class = get_called_class();
            $reflection = new ReflectionClass($class);
            static::$typeOfAnimals = $reflection->getConstants();
        }

        if (! array_key_exists($animalType, static::$typeOfAnimals)) {
            throw new Exception("허용하지 않는 동물입니다: {$animalType}");
        }

        return new static($animalType);
    }

    public function getAllAnimalTypes()
    {
        return static::$typeOfAnimals;
    }

    public function getAnimalType()
    {
        return $this->animalType;
    }

    public function __toString()
    {
        return $this->animalType;
    }
}
