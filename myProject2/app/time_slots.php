<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class time_slots extends Model
{
    protected $fillable =[
        'time_from','time_to','total_hours'
    ];
}
