<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notif extends Model
{
    protected $guarded = [];

    public function transportation()
    {
        return $this->belongsTo(Transportation::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
