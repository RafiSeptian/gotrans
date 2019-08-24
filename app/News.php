<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $guarded = ['id'];

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }
}
