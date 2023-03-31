<?php

namespace App\Services;

use App\Repositories\StudentRepository;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentService
{
  protected $studentRepository;

  public function __construct(StudentRepository $studentRepository)
  {
    $this->studentRepository = $studentRepository;
  }
  public function getStudents()
  {
    return $this->studentRepository->getStudents();
  }
  public function createStudent($data)
  {
    $student = new Student;
    $student->name = $data['name'];
    $student->surname = $data['surname'];
    $student->year = $data['year'];
    $this->studentRepository->save($student);
  }
  public function createOrUpdateStudent(Request $data)
  {
    $studentsArray = $data->all();
    if (isset($studentsArray[0]['id'])) {
      $this->assignStudentToClass($data);
    } else {
      $this->createStudent($data);
    }
  }
  public function assignStudentToClass(Request $data)
  {
    $studentsArray = $data->all();
    foreach ($studentsArray as $student) {
      $studentWithClass = Student::find($student['id']);
      $studentWithClass->class_id = $data['class_id'];
      $studentWithClass->name = $data['name'];
      $studentWithClass->surname = $data['surname'];
      $studentWithClass->year = $data['year'];
      $this->studentRepository->update($studentWithClass);
    }
  }
}
