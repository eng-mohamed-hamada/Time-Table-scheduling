<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class student_subjects extends Model
{
    protected $fillable = ['student_id', 'subject_code', 'mark','points', 'gained_hours', 'gpa','student_term_id'];
}
