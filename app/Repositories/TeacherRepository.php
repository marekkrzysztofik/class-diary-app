<?php

namespace App\Repositories;

use App\Models\Teacher;

class TeacherRepository
{
    protected $teacher;
    public function __construct()
    {
        $this->teacher = new Teacher();
    }
    public function getTeacherById($id)
    {
        return $this->teacher->find($id);
    }
    public function save($teacher)
    {
        $teacher->save();
    }
    public function update($teacher)
    {
        $teacher->update();
    }
}
 