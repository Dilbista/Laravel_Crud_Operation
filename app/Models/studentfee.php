<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class studentfee extends Model
{
    protected $fillable = ['student_id', 'amount', 'date', 'message'];

    
}
