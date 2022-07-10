<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pre_requests extends Model
{
    protected $fillable = [
        'subject_code', 'pre_request_code'
    ];
}
