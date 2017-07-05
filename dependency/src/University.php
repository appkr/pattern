<?php

namespace App;

use Illuminate\Support\Collection;

class University
{
    private $name;
    private $departments;

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->departments = new Collection;
    }

    public function addDepartment(Department $department)
    {
        $this->departments->push($department);
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDepartments()
    {
        return $this->departments->toBase();
    }
}