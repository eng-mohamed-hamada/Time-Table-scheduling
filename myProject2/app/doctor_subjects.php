<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class doctor_subjects extends Model
{
    protected $fillable = [
        'doctor_id', 'subject_code', 'teach_method_id', 'devision_type_id'
    ];
}
