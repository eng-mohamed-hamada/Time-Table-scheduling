<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class doctors extends Model
{
    protected $fillable = ['id', 'name', 'depart_id', 'degree_id'];
}
