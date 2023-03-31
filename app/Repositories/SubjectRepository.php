<?php

namespace App\Repositories;

use App\Models\Subject;

class SubjectRepository
{
    protected $subject;
    public function __construct()
    {
        $this->subject = new Subject();
    }
    public function save($subject)
    {
        $subject->save();
    }
}
