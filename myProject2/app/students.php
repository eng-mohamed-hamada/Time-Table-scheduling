<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class students extends Model
{
    protected $fillable = [
        'id','name','level_id','depart_id','level_group_id','total_gpa','total_gained_points','total_gained_hours','total_evaluation'
    ];
}
