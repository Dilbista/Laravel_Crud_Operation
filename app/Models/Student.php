<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $fillable = ['name', 'address', 'contact'];
    public function profile()
    {
        return $this->hasOne(StudentProfile::class);
    }

     public function fees()
    {
        return $this->hasMany(studentfee::class);
    }

      public function teacher()
    {
        return $this->belongsToMany(Teacher::class);
    }
}
