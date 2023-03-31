<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\StudentService;

class StudentController extends Controller
{
    protected $student;
    private StudentService $studentService;

    public function __construct(StudentService $studentService)
    {
        $this->studentService = $studentService;
    }
    public function createOrUpdateStudent(Request $data)
    {
        $this->studentService->createOrUpdateStudent($data);
    }
    public function getStudents()
    {
        return $this->studentService->getStudents();
    }
} 
