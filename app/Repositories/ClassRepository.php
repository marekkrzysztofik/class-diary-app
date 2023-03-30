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
    public function save($class)
    {
        $class->save();
    }
}
