<?php

namespace App\Services;

use App\Repositories\ClassRepository; 
use App\Models\StudentClass;
use Illuminate\Http\Request;

class ClassService
{
  protected $classRepository;

  public function __construct(ClassRepository $classRepository)
  {
    $this->classRepository = $classRepository; 
  }
  public function getClassesByYear($year)
    {
        return $this->classRepository->getClassesByYear($year);
    }
    public function getClasses()
    {
        return $this->classRepository->getClasses();
    }
  public function createOrUpdateClass(Request $data)
  {
    $class = new StudentClass;
    $class->year = $data['year'];
    $class->name = $data['name'];
    $class->quantity = $data['quantity'];
    $this->classRepository->save($class);
  } 
}
