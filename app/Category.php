<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name', 'parent_id', 'image', 'slug', 'order'
    ];

    protected $dates = [
        'created_at', 'updated_at',
    ];
}
