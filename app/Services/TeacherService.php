<?php

namespace App\Services;

use App\Repositories\TeacherRepository; 
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherService
{
  protected $teacherRepository;

  public function __construct(TeacherRepository $teacherRepository)
  {
    $this->teacherRepository = $teacherRepository; 
  }
  public function getTeacherById($id)
    {
        return $this->teacherRepository->getTeacherById($id);
    } 
}
