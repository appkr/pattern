<?php

namespace App;

use Illuminate\Support\Collection;

class Student
{
    private $name;
    private $teachers;

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->teachers = new Collection;
    }

    public function associateTeacher(Teacher $teacher)
    {
        $this->teachers->push($teacher);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getTeachers()
    {
        return $this->teachers->toBase();
    }
}