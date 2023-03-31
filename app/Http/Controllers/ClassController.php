<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ClassService;

class ClassController extends Controller
{
    protected $class;
    private ClassService $classService;

    public function __construct(ClassService $classService)
    {
        $this->classService = $classService;
    }
    public function createOrUpdateClass(Request $data)
    {
        $this->classService->createOrUpdateClass($data);
    }
    public function getClassesByYear($year)
    {
        return $this->classService->getClassesByYear($year);
    }
    public function getClasses()
    {
        return $this->classService->getClasses();
    }
} 
