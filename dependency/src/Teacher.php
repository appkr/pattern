<?php

namespace App;

use Illuminate\Support\Collection;

class Teacher
{
    private $name;
    private $students;
    private $departmentName;

    public function __construct(string $name, Department $department)
    {
        $this->name = $name;
        $this->students = new Collection;
        $this->departmentName = $department->getName();
    }

    public function associateStudent(Student $student)
    {
        $this->students->push($student);
    }

    public function getName()
    {
        return $this->name;
    }

    public function getStudents()
    {
        // Teacher 클래스의 내부 상태를 보호하기 위해서 사본을 반환합니다.
        //
        // associateStudent() API를 통해서만 Teacher에 Student를 추가할 수 있습니다.
        // getStudents() API에서 Collection $students 변수를 직접 노출하면
        // 다른 객체에서 $teacher->getStudents()->push(new Student('foo'))와 같이
        // associateStudent() 함수를 거치지 않고도 Student를 추가할 수 있습니다.
        // 이는 객체 내부의 데이터를 일관되지 않게 오염시키므로, 설계할 때 주의해야 합니다.
        return $this->students->toBase();
    }

    public function getDepartmentName(): string
    {
        return $this->departmentName;
    }
}