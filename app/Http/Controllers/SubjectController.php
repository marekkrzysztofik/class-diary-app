<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SubjectService;

class SubjectController extends Controller
{
    protected $class;
    private SubjectService $subjectService;

    public function __construct(SubjectService $subjectService)
    {
        $this->subjectService = $subjectService;
    }
    public function createOrUpdateSubject(Request $data)
    {
        $this->subjectService->createOrUpdateSubject($data);
    }
    
} 
