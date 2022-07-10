<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subjects extends Model
{
    protected $fillable = [
        'code', 'name', 'level_id', 'hours', 'total_hours', 'groups_hours', 'full_mark','success_mark'
    ];
}
