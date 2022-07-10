<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class student_requests extends Model
{
    protected $fillable=[
        'student_id', 'required_hours', 'resson', 'term_id'
    ];
}
