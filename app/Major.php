<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    protected $guarded = ['id'];

    public function services()
    {
        return $this->hasMany(Services::class);
    }
}
