<?php

namespace Basic\Dependency;

use PHPUnit\Framework\TestCase;

class AggregationTest extends TestCase
{
    function testADepartmentCanHaveMultipleTeachers()
    {
        $university = new University('u1');
        $department = new Department('d1', $university);
        $department->addTeacher(new Teacher('t1', $department));
        $department->addTeacher(new Teacher('t2', $department));

        /** @var Teacher $teacherOne */
        $teacherOne = $department->getTeachers()->first();

        $this->assertInstanceOf(Department::class, $department);
        $this->assertCount(2, $department->getTeachers());
        $this->assertEquals('t1', $teacherOne->getName());
    }
}