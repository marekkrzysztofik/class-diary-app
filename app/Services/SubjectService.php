<?php

namespace App\Services;

use App\Repositories\SubjectRepository;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectService
{
  protected $subjectRepository;

  public function __construct(SubjectRepository $subjectRepository)
  {
    $this->subjectRepository = $subjectRepository;
  }
  public function createOrUpdateSubject(Request $data)
  {
    $subject = new Subject;
    $subject->name = $data['name'];
    $subject->year = $data['year'];
    $this->subjectRepository->save($subject);
  }
}
