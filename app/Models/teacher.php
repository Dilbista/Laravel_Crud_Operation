<?php

namespace App\Models;

use App\Http\Controllers\RoleController;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;

class teacher extends Model
{
    protected $fillable = ['name', 'address', 'role', 'contact'];

    public function profile()
    {
        return $this->hasOne(teacherProfile::class);
    }
    public function student()
    {
        return $this->belongsToMany(Student::class);
    }

    public function role()
    {
        return $this->belongsToMany(Role::class);
    }
}
