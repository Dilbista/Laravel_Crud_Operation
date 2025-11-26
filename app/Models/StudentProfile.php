<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentProfile extends Model
{
    protected $fillable = ['student_id', 'father_name', 'class'];
    
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
