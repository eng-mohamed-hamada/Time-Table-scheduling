<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class doctor_days extends Model
{
    protected $fillable = ['doctor_id', 'day_id'];
}
