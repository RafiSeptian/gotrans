<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transportation()
    {
        return $this->belongsTo(Transportation::class);
    }

    public function major()
    {
        return $this->belongsTo(Major::class);
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
