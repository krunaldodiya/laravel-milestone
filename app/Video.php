<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
        'title', 'description', 'category_id', 'topic_id', 'thumbnail', 'url', 'order'
    ];

    protected $dates = [
        'created_at', 'updated_at',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }
}
