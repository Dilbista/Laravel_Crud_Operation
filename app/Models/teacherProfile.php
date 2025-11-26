<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class teacherProfile extends Model
{
        protected $fillable = ['teacher_id', 'father_name' ,'mother_name', 'class'];
          public function teacher()
    {
        return $this->belongsTo(teacher::class);
    }
}
