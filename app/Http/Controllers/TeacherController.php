<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TeacherService;

class TeacherController extends Controller
{
    protected $teacher;
    private TeacherService $teacherService;

    public function __construct(TeacherService $teacherService)
    {
        $this->teacherService = $teacherService;
    }
    public function registerOrUpdateTeacher(Request $data)
    {
        $this->teacherService->registerOrUpdateTeacher($data);
    }
    public function getTeacherById($id)
    {
        return $this->teacherService->getTeacherById($id);
    }
}
