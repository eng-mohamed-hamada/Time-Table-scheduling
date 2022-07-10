<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class doctor_day_time_slots extends Model
{
    protected $fillable = [
        'doctor_id', 'day_time_slots_id', 'doctor_subject_id', 'place_id', 'level_group_id'
    ];
}
