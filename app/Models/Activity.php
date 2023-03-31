<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;
    public function classes()
    {
        return $this->belongsTo(StudentClass::class);
    }
    public function teachers()
    {
        return $this->belongsTo(Teacher::class);
    }
    public function subjects()
    {
        return $this->belongsTo(Subject::class);
    }
}
