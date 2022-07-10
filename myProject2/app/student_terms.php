<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class student_terms extends Model
{
    protected $fillable = [
        'student_id','term_id','term_gpa','term_evaluation','term_gained_points','term_gained_hours'
    ];
}
