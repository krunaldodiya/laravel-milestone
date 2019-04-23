<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = [
        'name', 'location'
    ];

    protected $dates = [
        'created_at', 'updated_at',
    ];
}
