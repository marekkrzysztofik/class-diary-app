<?php

namespace App\Repositories;

use App\Models\StudentClass;

class ClassRepository
{
    protected $class;
    public function __construct()
    {
        $this->class = new StudentClass();
    }
    public function getClassesByYear($year)
    {
        return $this->class->where('year', '=', $year)->get();
    }
    public function getClasses()
    {
        return StudentClass::all();
    }
    public function save($class)
    {
        $class->save();
    }
}
 