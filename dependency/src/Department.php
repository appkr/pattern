<?php

namespace App;

use Illuminate\Support\Collection;

class Department
{
    private $name;
    private $teachers;
    private $universityName;

    public function __construct(string $name, University $university)
    {
        $this->name = $name;
        $this->teachers = new Collection;
        $this->universityName = $university->getName();
    }

    public function addTeacher(Teacher $teacher)
    {
        $this->teachers->push($teacher);
    }

    public function getName()
    {
        return $this->name;
    }

    public function getTeachers()
    {
        return $this->teachers->toBase();
    }

    public function getUniversityName()
    {
        return $this->universityName;
    }
}