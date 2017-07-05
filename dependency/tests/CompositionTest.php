<?php

namespace Test;

use App\Department;
use App\University;
use PHPUnit\Framework\TestCase;

class CompositionTest extends TestCase
{
    function testUniversityCanHaveMultipleDepartments()
    {
        $university = new University('u1');
        $university->addDepartment(new Department('d1', $university));
        $university->addDepartment(new Department('d2', $university));

        /** @var Department $departmentOne */
        $departmentOne = $university->getDepartments()->first();

        $this->assertInstanceOf(University::class, $university);
        $this->assertCount(2, $university->getDepartments());
        $this->assertEquals('d1', $departmentOne->getName());
    }
}
