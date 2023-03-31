<?php

namespace App\Repositories;

use App\Models\Student;

class StudentRepository
{
    protected $student;
    public function __construct()
    {
        $this->student = new Student();
    }
    public function getStudents()
    {
        return Student::all();
    }
    public function save($student)
    {
        $student->save();
    }
    public function update($student)
  {
    $student->update();
  }
}
 