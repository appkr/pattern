<?php

namespace Basic\Dependency;

use PHPUnit\Framework\TestCase;

class AssociationTest extends TestCase
{
    function testEachStudentCanBeAssociatedWithMultipleTeachers()
    {
        $university = new University('u1');
        $department = new Department('d1', $university);
        $student = new Student('s1');
        $student->associateTeacher(new Teacher('t1', $department));
        $student->associateTeacher(new Teacher('t2', $department));

        /** @var Teacher $teacherOne */
        $teacherOne = $student->getTeachers()->first();

        $this->assertInstanceOf(Student::class, $student);
        $this->assertCount(2, $student->getTeachers());
        $this->assertEquals('t1', $teacherOne->getName());
    }

    function testEachTeacherCanBeAssociatedWithMultipleStudents()
    {
        $university = new University('u1');
        $department = new Department('d1', $university);
        $teacher = new Teacher('t1', $department);
        $teacher->associateStudent(new Student('s1'));
        $teacher->associateStudent(new Student('s2'));

        /** @var Student $studentOne */
        $studentOne = $teacher->getStudents()->first();

        $this->assertInstanceOf(Teacher::class, $teacher);
        $this->assertCount(2, $teacher->getStudents());
        $this->assertEquals('s1', $studentOne->getName());
    }
}